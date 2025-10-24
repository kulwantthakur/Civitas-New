<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\AudioFile;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ImportPodcasts extends Command
{
    protected $signature = 'podcasts:import
        {--file= : Path to Excel file}
        {--limit= : Max number of rows to process}
        {--dry-run : Run without saving to DB}
        {--duplicate-action=skip : Action for duplicates (skip or update)}';

    protected $description = 'Import podcasts from Excel and save associated audio files';

    public function handle()
    {
        $file = $this->option('file');
        $limit = $this->option('limit') ? (int) $this->option('limit') : null;
        $duplicateAction = $this->option('duplicate-action') ?: 'skip';
        $dryRun = $this->option('dry-run');

        if (!$file || !file_exists($file)) {
            $this->error('Please provide a valid --file path (Excel or CSV)');
            return 1;
        }

        if ($dryRun) {
            $this->warn('=== DRY RUN MODE: No database changes will be made ===');
        }

        $this->info("Starting import from file: {$file}");
        $this->info("Duplicate action: {$duplicateAction}");
        if ($limit) $this->info("Limit: {$limit}");

        $rows = Excel::toArray([], $file)[0]; // first sheet

        // Remove header row if detected
        if (isset($rows[0]) && str_contains(strtolower(implode(',', $rows[0])), 'title')) {
            array_shift($rows);
        }

        $imported = $updated = $skipped = $processed = 0;

        foreach ($rows as $i => $row) {
            if ($limit && $processed >= $limit) break;
            $processed++;

            $audioUrl = trim($row[0] ?? '');
            $categoryName = trim($row[1] ?? '');
            $title = trim($row[2] ?? '');
            $author = trim($row[3] ?? '');
            $description = trim($row[4] ?? '');
            $podcastUrl = trim($row[5] ?? '');
            // $date = !empty($row[7]) ? Carbon::parse($row[7])->format('Y-m-d') : null;
            [$startDate, $endDate] = $this->parseDateRange($row[7] ?? null);
            $place = trim($row[8] ?? '');

            if (!$title || !$podcastUrl) {
                $this->warn("Skipping row {$i} — missing title or URL");
                continue;
            }

            $this->info("Processing row {$i}: {$title}");

            // Get or create category
            // $category = PodcastCategory::firstOrCreate(['name' => $categoryName, 'podcast_category_identifier' => 'PC-' . uniqid('', true)]);
            $categoryCache = PodcastCategory::all()->keyBy(fn($c) => mb_strtoupper($c->name, 'UTF-8'));
            $categoryNameUpper = mb_strtoupper($categoryName, 'UTF-8');
            if (isset($categoryCache[$categoryNameUpper])) {
                $category = $categoryCache[$categoryNameUpper];
            } else {
                $category = PodcastCategory::create([
                    'name' => $categoryNameUpper,
                    'url' => mb_strtolower(str_replace(' ', '-', $categoryName), 'UTF-8'),
                    'podcast_category_identifier' => 'PC-' . uniqid('', true),
                ]);
                $categoryCache[$categoryNameUpper] = $category;
            }


            // Check existing podcast by URL
            $existing = Podcast::where('url', $podcastUrl)->first();

            if ($existing) {
                if ($duplicateAction === 'skip') {
                    $this->warn("  → Skipping duplicate: {$title}");
                    $skipped++;
                    continue;
                }

                if ($duplicateAction === 'update') {
                    if ($dryRun) {
                        $this->line("  → Would update existing podcast: {$title}");
                    } else {
                        $existing->update([
                            'category_id' => $category->id,
                            'title' => $title,
                            'author' => $author,
                            'description' => $description,
                            // 'start_date' => $date,
                            'start_date' => $startDate,
                            'end_date' => $endDate,
                            'location' => $place,
                        ]);
                        if ($audioUrl) {
                            AudioFile::updateOrCreate(
                                ['podcast_id' => $existing->id],
                                ['file_path' => $audioUrl]
                            );
                        }
                    }
                    $this->line("  ✓ Updated: {$title}");
                    $updated++;
                    continue;
                }
            }

            if ($dryRun) {
                $this->line("  → Would import: {$title}");
                continue;
            }

            // Create new podcast
            $podcast = Podcast::create([
                'category_id' => $category->id,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'url' => $podcastUrl,
                // 'start_date' => $date,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'location' => $place,
                'podcast_identifier' => 'PO-' . uniqid('', true),
            ]);

            if ($audioUrl) {
                AudioFile::updateOrCreate(
                    ['podcast_id' => $podcast->id],
                    ['file_path' => $audioUrl]
                );
            }

            $imported++;
            $this->line("  ✓ Imported: {$title}");
        }
        $totalPodcasts = Podcast::count();
        $this->info("\n=== Import Summary ===");
        $this->info("Processed: {$processed}");
        $this->info("Imported: {$imported}");
        $this->info("Updated: {$updated}");
        $this->info("Skipped: {$skipped}");
        // $this->info("Total podcasts in DB: {$totalPodcasts}");
        $this->info("Import completed!");

        return 0;
    }

    private function parseDateRange(?string $raw): array
    {
        if (!$raw) return [null, null];

        $raw = trim($raw);

        // Case 1: Range of years like "1999 - 2005"
        if (preg_match('/^(\d{4})\s*[-–]\s*(\d{4})$/', $raw, $m)) {
            return [
                Carbon::createFromDate($m[1], 1, 1)->format('Y-m-d'),
                Carbon::createFromDate($m[2], 12, 31)->format('Y-m-d'),
            ];
        }

        // Case 2: Range with days and month, e.g. "15 - 20.07.1996"
        if (preg_match('/^(\d{1,2})\s*[-–]\s*(\d{1,2})[.\-\/](\d{1,2})[.\-\/](\d{4})$/', $raw, $m)) {
            // $m[1] = start day
            // $m[2] = end day
            // $m[3] = month
            // $m[4] = year
            return [
                Carbon::createFromDate($m[4], $m[3], $m[1])->format('Y-m-d'),
                Carbon::createFromDate($m[4], $m[3], $m[2])->format('Y-m-d'),
            ];
        }

        // Case 3: Single full date like "20.07.1996"
        if (preg_match('/^(\d{1,2})[.\-\/](\d{1,2})[.\-\/](\d{4})$/', $raw, $m)) {
            return [
                Carbon::createFromDate($m[3], $m[2], $m[1])->format('Y-m-d'),
                null,
            ];
        }

        // Case 4: Year only like "2009"
        if (preg_match('/^\d{4}$/', $raw)) {
            return [
                Carbon::createFromDate($raw, 1, 1)->format('Y-m-d'),
                null,
            ];
        }

        return [null, null];
    }

}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\AudioFile;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ImportPodcastsCommand extends Command
{
    protected $signature = 'podcasts--:import
        {--file= : Path to Excel/CSV file}
        {--limit= : Limit number of podcasts to import}
        {--duplicate-action=skip : Action for duplicates (skip or update)}
        {--dry-run : Run without saving to database}';

    protected $description = 'Import podcasts from an Excel or CSV file into the database';

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
        $totalRows = count($rows);
        $this->info("Found {$totalRows} rows in file");

        // Remove header if it contains column names
        if (isset($rows[0]) && str_contains(strtolower(implode(',', $rows[0])), 'title')) {
            array_shift($rows);
        }

        $imported = 0;
        $updated = 0;
        $skipped = 0;
        $processed = 0;

        foreach ($rows as $i => $row) {
            if ($limit && $processed >= $limit) {
                $this->info("Reached processing limit of {$limit} rows");
                break;
            }

            $processed++;

            $audioUrl = $row[0] ?? null;
            $categoryName = trim($row[1] ?? '');
            $title = trim($row[2] ?? '');
            $author = trim($row[3] ?? '');
            $description = $row[4] ?? null;
            $podcastUrl = trim($row[5] ?? '');
            $date = !empty($row[6]) ? Carbon::parse($row[6])->format('Y-m-d') : null;
            $place = $row[7] ?? null;

            if (!$title || !$podcastUrl) {
                $this->warn("Skipping row {$i} — missing title or URL");
                continue;
            }

            $this->info("Processing row: " . ($i + 1));
            $this->line("  → Title: {$title}");
            $this->line("  → Author: {$author}");
            $this->line("  → Category: {$categoryName}");
            $this->line("  → Date: {$date}");
            $this->line("  → URL: {$podcastUrl}");

            // Get or create category
            $category = PodcastCategory::firstOrCreate(['name' => $categoryName]);

            $existing = Podcast::where('url', $podcastUrl)->first();

            if ($existing) {
                if ($duplicateAction === 'skip') {
                    $this->warn("  → Skipping duplicate: {$title}");
                    $skipped++;
                    continue;
                }

                if ($duplicateAction === 'update') {
                    if ($dryRun) {
                        $this->line("  → Would update existing podcast");
                    } else {
                        $existing->update([
                            'category_id' => $category->id,
                            'title' => $title,
                            'author' => $author,
                            'description' => $description,
                            'date' => $date,
                            'place' => $place,
                        ]);
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

            $podcast = Podcast::create([
                'category_id' => $category->id,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'url' => $podcastUrl,
                'date' => $date,
                'place' => $place,
            ]);

            if (!empty($audioUrl)) {
                AudioFile::updateOrCreate(['podcast_id' => $podcast->id], ['url' => $audioUrl]);
            }

            $imported++;
            $this->line("  ✓ Imported: {$title}");
        }

        $this->info("\n=== Import Summary ===");
        $this->info("Successfully imported: {$imported}");
        $this->info("Updated: {$updated}");
        $this->info("Skipped: {$skipped}");
        $this->info("Total processed: {$processed}");
        $this->info("Import completed!");

        return 0;
    }
}

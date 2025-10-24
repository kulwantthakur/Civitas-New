<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ImportPagesCommanddd extends Command
{
    /**
     * Find the bulletin path by checking common locations
     */
    private function findBulletinPath()
    {
        $possiblePaths = [
            'import/bulletins',
            'public/import/bulletins',
            'storage/app/import/bulletins',
            base_path('import/bulletins'),
        ];

        foreach ($possiblePaths as $path) {
            $fullPath = $path;
            if (!str_starts_with($path, '/') && !str_starts_with($path, base_path())) {
                $fullPath = base_path($path);
            }
            
            if (File::isDirectory($fullPath)) {
                return $path;
            }
        }

        return 'import/bulletins'; // Default fallback
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pages:import {--source=} {--user-id=} {--section-id=} {--category=} {--dry-run : Run without making database changes} {--limit= : Limit number of pages to process}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import pages from bulletin files into the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sourcePath = $this->option('source') ?: $this->findBulletinPath();
        $userId = $this->option('user-id');
        $sectionId = $this->option('section-id');
        $category = $this->option('category') ?: 'bulletin';
        $dryRun = $this->option('dry-run');
        $limit = $this->option('limit') ? (int) $this->option('limit') : null;

        if (!$userId) {
            $this->error('Please provide a user ID with --user-id option');
            return 1;
        }

        if (!$sectionId) {
            $this->error('Please provide a section ID with --section-id option');
            return 1;
        }

        if ($dryRun) {
            $this->warn('=== DRY RUN MODE - No database changes will be made ===');
        }

        $this->info("Starting page import from: {$sourcePath}");
        $this->info("User ID: {$userId}");
        $this->info("Section ID: {$sectionId}");
        $this->info("Category: {$category}");
        if ($limit) {
            $this->info("Limit: {$limit} pages");
        }

        $importedCount = 0;
        $errorCount = 0;

        // Get all bulletin folders
        $bulletinPath = $sourcePath;
        if (!str_starts_with($sourcePath, '/')) {
            $bulletinPath = base_path($sourcePath);
        }

        if (!File::isDirectory($bulletinPath)) {
            $this->error("Source directory does not exist: {$bulletinPath}");
            $this->info("Please create the directory or specify the correct path with --source option");
            return 1;
        }

        $bulletinFolders = File::directories($bulletinPath);

        if (empty($bulletinFolders)) {
            $this->warn("No bulletin folders found in {$sourcePath}");
            return 0;
        }

        $this->info("Found " . count($bulletinFolders) . " bulletin folders to process");

        $processedFolders = 0;

        foreach ($bulletinFolders as $folderPath) {
            // Check limit
            if ($limit && $processedFolders >= $limit) {
                $this->info("Reached processing limit of {$limit} folders");
                break;
            }

            $folderName = basename($folderPath);
            $bulletinFile = $folderPath . '/bulletin.txt';

            if (!File::exists($bulletinFile)) {
                $this->warn("bulletin.txt not found in folder: {$folderName}");
                $errorCount++;
                continue;
            }

            try {
                $this->info("Processing folder: {$folderName}");
                
                // Parse bulletin.txt file
                $bulletinData = $this->parseBulletinFile($bulletinFile);
                
                if (!$bulletinData) {
                    $this->warn("Could not parse bulletin data from: {$folderName}");
                    $errorCount++;
                    continue;
                }

                // Extract number from folder name if not set in bulletin data
                if (!isset($bulletinData['number'])) {
                    preg_match('/^(\d+)-/', $folderName, $matches);
                    $bulletinData['number'] = $matches[1] ?? null;
                }

                if ($dryRun) {
                    // Just show what would be imported
                    $this->line("  → Would import: " . ($bulletinData['title'] ?? 'Untitled'));
                    $this->line("  → Author: " . ($bulletinData['author'] ?? 'Unknown'));
                    $this->line("  → Year: " . ($bulletinData['year'] ?? 'N/A'));
                    $this->line("  → Period: " . ($bulletinData['period'] ?? 'N/A'));
                    $this->line("  → Number: " . ($bulletinData['number'] ?? 'N/A'));
                    
                    // Count files
                    $files = File::files($folderPath);
                    $fileCount = count(array_filter($files, fn($file) => $file->getFilename() !== 'bulletin.txt'));
                    $this->line("  → Files to copy: {$fileCount}");
                    
                    $importedCount++;
                } else {
                    // Create new page
                    $newPage = new Page();
                    $newPage->page_identifier = 'PA-' . uniqid('', true);
                    $newPage->user_id = $userId;
                    $newPage->section_id = $sectionId;
                    $newPage->category = $category;
                    $newPage->url = $this->generateUrl($bulletinData['title'] ?? $folderName);
                    $newPage->number = $bulletinData['number'] ?? null;
                    $newPage->period = $bulletinData['period'] ?? null;
                    $newPage->year = $bulletinData['year'] ?? null;
                    $newPage->title = $bulletinData['title'] ?? 'Untitled';
                    $newPage->subtitle = $bulletinData['author'] ?? null;
                    $newPage->content = $bulletinData['description'] ?? null;
                    $newPage->content_sec = $bulletinData['extra'] ?? null;
                    $newPage->link = null;
                    $newPage->upload_video = null;
                    $newPage->pdf = null;
                    $newPage->icon = null;
                    $newPage->image = null;
                    $newPage->image_responsive = null;
                    $newPage->events_image = null;
                    $newPage->html_soruce = null;
                    $newPage->is_active = '1';
                    $newPage->is_deleted = '0';
                    $newPage->created_at = Carbon::now();
                    $newPage->updated_at = Carbon::now();
                    
                    $newPage->save();

                    // Handle file imports
                    $this->processFiles($folderPath, $newPage);

                    $importedCount++;
                    $this->line("✓ Imported: {$newPage->title}");
                }

                $processedFolders++;

            } catch (\Exception $e) {
                $this->error("Error processing {$folderName}: " . $e->getMessage());
                $errorCount++;
            }
        }

        $this->info("\n=== Import Summary ===");
        $this->info("Successfully imported: {$importedCount} pages");
        if ($errorCount > 0) {
            $this->warn("Errors encountered: {$errorCount}");
        }
        $this->info("Import completed!");

        return 0;
    }

    /**
     * Parse bulletin.txt file and extract data
     */
    private function parseBulletinFile($filePath)
    {
        $content = File::get($filePath);
        $lines = explode("\n", $content);
        
        $data = [];
        $currentKey = null;
        $descriptionLines = [];
        $inDescription = false;

        foreach ($lines as $line) {
            $line = trim($line);
            
            // Skip empty lines and separators
            if (empty($line) || str_starts_with($line, '---')) {
                continue;
            }

            // Parse key-value pairs
            if (preg_match('/^([^:]+):\s*(.*)$/', $line, $matches)) {
                $key = strtolower(trim($matches[1]));
                $value = trim($matches[2]);
                
                switch ($key) {
                    case 'title':
                    case 'titre':
                        $data['title'] = $value;
                        break;
                    case 'period':
                    case 'période':
                        $data['period'] = $value;
                        break;
                    case 'year':
                    case 'année':
                        $data['year'] = (int) $value;
                        break;
                    case 'author':
                    case 'auteur':
                        $data['author'] = $value;
                        break;
                    case 'extra':
                        $data['extra'] = $value;
                        break;
                    case 'snn-reference':
                    case 'reference':
                        $data['reference'] = $value;
                        break;
                    case 'description':
                        $inDescription = true;
                        if (!empty($value)) {
                            $descriptionLines[] = $value;
                        }
                        break;
                }
                $currentKey = $key;
            } elseif ($inDescription && !empty($line)) {
                // Continue collecting description lines
                if (str_starts_with($line, '-')) {
                    $descriptionLines[] = $line;
                }
            } elseif (preg_match('/^(\d+)$/', $line)) {
                // Standalone number (likely bulletin number)
                $data['number'] = (int) $line;
            }
        }

        // Combine description lines
        if (!empty($descriptionLines)) {
            $data['description'] = implode("\n", $descriptionLines);
        }

        return $data;
    }

    /**
     * Process files in the bulletin folder
     */
    private function processFiles($folderPath, $page)
    {
        $folderName = $page->page_identifier;
        $targetPath = public_path('site/' . $folderName);

        // Create target directory
        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0777, true);
        }

        $files = File::files($folderPath);
        
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $extension = $file->getExtension();
            $originalName = pathinfo($filename, PATHINFO_FILENAME);
            
            // Skip bulletin.txt as it's already processed
            if ($filename === 'bulletin.txt') {
                continue;
            }

            try {
                if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    // Handle images with proper naming and processing
                    $this->processImage($file, $page, $folderName, $targetPath);
                } elseif (strtolower($extension) === 'pdf') {
                    // Handle PDF files
                    $newFilename = 'pdf-' . $page->page_identifier . '.' . $extension;
                    $targetFilePath = $targetPath . '/' . $newFilename;
                    File::copy($file->getPathname(), $targetFilePath);
                    $page->pdf = 'site/' . $folderName . '/' . $newFilename;
                    $this->line("  → Copied PDF: {$newFilename}");
                } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov', 'wmv'])) {
                    // Handle video files
                    $newFilename = 'upload_video-' . $page->page_identifier . '.' . $extension;
                    $targetFilePath = $targetPath . '/' . $newFilename;
                    File::copy($file->getPathname(), $targetFilePath);
                    $page->upload_video = 'site/' . $folderName . '/' . $newFilename;
                    $this->line("  → Copied Video: {$newFilename}");
                } else {
                    // Copy other files as-is
                    $targetFilePath = $targetPath . '/' . $filename;
                    File::copy($file->getPathname(), $targetFilePath);
                    $this->line("  → Copied File: {$filename}");
                }

            } catch (\Exception $e) {
                $this->warn("  → Failed to copy {$filename}: " . $e->getMessage());
            }
        }

        $page->save();
    }

    /**
     * Process image files with ImageManager
     */
    private function processImage($file, $page, $folderName, $targetPath)
    {
        $filename = $file->getFilename();
        $extension = $file->getExtension();
        $originalName = strtolower(pathinfo($filename, PATHINFO_FILENAME));

        try {
            // Determine image type based on filename
            if (str_contains($originalName, 'icon')) {
                $newFilename = 'icon-' . $page->page_identifier . '.' . $extension;
                $field = 'icon';
            } elseif (str_contains($originalName, 'responsive') || str_contains($originalName, 'mobile')) {
                $newFilename = 'image_responsive-' . $page->page_identifier . '.' . $extension;
                $field = 'image_responsive';
            } elseif (str_contains($originalName, 'event')) {
                $newFilename = 'events_image-' . $page->page_identifier . '.' . $extension;
                $field = 'events_image';
            } else {
                // Default to main image
                $newFilename = 'image-' . $page->page_identifier . '.' . $extension;
                $field = 'image';
            }

            $targetFilePath = $targetPath . '/' . $newFilename;

            // Use ImageManager if available, otherwise just copy
            if (class_exists('Intervention\Image\ImageManager')) {
                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($file->getPathname())->save($targetFilePath);
            } else {
                // Fallback to simple file copy
                File::copy($file->getPathname(), $targetFilePath);
            }

            $page->$field = 'site/' . $folderName . '/' . $newFilename;
            $this->line("  → Processed Image ({$field}): {$newFilename}");

        } catch (\Exception $e) {
            // If ImageManager fails, try simple copy
            try {
                File::copy($file->getPathname(), $targetFilePath);
                $page->$field = 'site/' . $folderName . '/' . $newFilename;
                $this->line("  → Copied Image (fallback): {$newFilename}");
            } catch (\Exception $e2) {
                $this->warn("  → Failed to process image {$filename}: " . $e2->getMessage());
            }
        }
    }

    /**
     * Generate URL slug from title
     */
    private function generateUrl($title)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $title));
    }
}
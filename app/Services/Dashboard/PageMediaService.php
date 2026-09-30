<?php

namespace App\Services\Dashboard;

use App\Traits\HandlesFileUploads;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;

/**
 * Handles every file-related operation for pages (images, icons,
 * PDFs and uploaded videos), keeping the PageService free of
 * filesystem concerns.
 */
class PageMediaService
{
    use HandlesFileUploads;

    /**
     * Store all files present on the request against a page.
     *
     * @param \Illuminate\Http\Request|array $data
     * @param string $folderName Page identifier (e.g. PA-xxx) used as folder
     * @param array $oldFiles Current file paths on the page (for replacement)
     * @return array Map of field => stored relative path
     */
    public function storeFiles($data, string $folderName, array $oldFiles = [])
    {
        $folderPath = 'site/' . $folderName;
        $stored = [];

        $imageFields = [
            'icon' => 'icon',
            'image' => 'image',
            'image_responsive' => 'image_responsive',
            'events_image' => 'events_image',
        ];

        foreach ($imageFields as $field => $prefix) {
            $file = $this->getFile($data, $field);
            if ($file instanceof UploadedFile) {
                $stored[$field] = $this->storeImage(
                    $file,
                    $folderPath,
                    $prefix . '-' . $folderName,
                    $oldFiles[$field] ?? null
                );
            }
        }

        $fileFields = [
            'pdf' => 'pdf',
            'upload_video' => 'upload_video',
        ];

        foreach ($fileFields as $field => $prefix) {
            $file = $this->getFile($data, $field);
            if ($file instanceof UploadedFile) {
                $stored[$field] = $this->handleFileUpload(
                    $file,
                    $folderPath,
                    $prefix . '-' . $folderName,
                    $oldFiles[$field] ?? null
                );
            }
        }

        return $stored;
    }

    /**
     * Delete the media files referenced by a page (used on hard delete).
     *
     * @param array $paths Field => relative path
     * @return void
     */
    public function deleteFiles(array $paths)
    {
        foreach ($paths as $path) {
            if (is_string($path) && $path !== '') {
                $this->deleteFileIfExists($path);
            }
        }
    }

    /**
     * Save an image, preferring ImageMagick when available and falling
     * back to GD otherwise so uploads work on any environment.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folderPath
     * @param string $filenamePrefix
     * @param string|null $oldFilePath
     * @return string Relative path to saved file
     */
    protected function storeImage(UploadedFile $file, string $folderPath, string $filenamePrefix, $oldFilePath = null): string
    {
        $filename = $filenamePrefix . '.' . $file->getClientOriginalExtension();
        $this->ensureDirectoryExists(public_path($folderPath));

        $fullPath = public_path($folderPath . '/' . $filename);

        $driver = extension_loaded('imagick') ? 'imagick' : 'gd';
        $manager = new ImageManager(['driver' => $driver]);
        $manager->make($file->getRealPath())->save($fullPath);

        if ($oldFilePath && file_exists(public_path($oldFilePath))) {
            \Illuminate\Support\Facades\File::delete(public_path($oldFilePath));
        }

        return $folderPath . '/' . $filename;
    }

    /**
     * Pull an UploadedFile from either a Request-like object or a plain array.
     *
     * @param \Illuminate\Http\Request|array $data
     * @param string $field
     * @return \Illuminate\Http\UploadedFile|null
     */
    private function getFile($data, string $field)
    {
        if (is_array($data)) {
            return isset($data[$field]) && $data[$field] instanceof UploadedFile
                ? $data[$field]
                : null;
        }

        return $data->hasFile($field) ? $data->file($field) : null;
    }
}

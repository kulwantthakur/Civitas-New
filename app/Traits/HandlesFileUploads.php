<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

/**
 * Trait for handling file uploads across controllers.
 * Centralizes file upload logic to avoid code duplication.
 */
trait HandlesFileUploads
{
    /**
     * Ensure a directory exists, creating it if necessary.
     *
     * @param string $path
     * @param int $permissions
     * @param bool $recursive
     * @return void
     */
    protected function ensureDirectoryExists($path, $permissions = 0777, $recursive = true)
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, $permissions, $recursive);
        }
    }

    /**
     * Handle image upload with ImageManager.
     *
     * @param UploadedFile $file
     * @param string $folderPath
     * @param string $filenamePrefix
     * @param string|null $oldFilePath Optional old file to delete
     * @return string Relative path to saved file
     */
    protected function handleImageUpload(UploadedFile $file, $folderPath, $filenamePrefix, $oldFilePath = null)
    {
        $filename = $filenamePrefix . '.' . $file->getClientOriginalExtension();
        $this->ensureDirectoryExists(public_path($folderPath));
        
        $fullPath = public_path($folderPath . '/' . $filename);
        
        $manager = new ImageManager(['driver' => 'imagick']);
        $manager->make($file->getRealPath())->save($fullPath);
        
        // Delete old file if exists
        if ($oldFilePath && file_exists(public_path($oldFilePath))) {
            File::delete(public_path($oldFilePath));
        }
        
        return $folderPath . '/' . $filename;
    }

    /**
     * Handle file upload (non-image files like PDF, video).
     *
     * @param UploadedFile $file
     * @param string $folderPath
     * @param string $filenamePrefix
     * @param string|null $oldFilePath Optional old file to delete
     * @return string Relative path to saved file
     */
    protected function handleFileUpload(UploadedFile $file, $folderPath, $filenamePrefix, $oldFilePath = null)
    {
        $filename = $filenamePrefix . '.' . $file->getClientOriginalExtension();
        $this->ensureDirectoryExists(public_path($folderPath));
        
        $file->move(public_path($folderPath), $filename);
        
        // Delete old file if exists
        if ($oldFilePath && file_exists(public_path($oldFilePath))) {
            File::delete(public_path($oldFilePath));
        }
        
        return $folderPath . '/' . $filename;
    }

    /**
     * Handle audio file upload with sanitized filename.
     *
     * @param UploadedFile $file
     * @param string $folderPath
     * @param string $identifier
     * @return array ['path' => string, 'original_name' => string]
     */
    protected function handleAudioUpload(UploadedFile $file, $folderPath, $identifier)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $sanitized = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
        $filename = $sanitized . '-' . $identifier . '.' . $extension;
        
        $this->ensureDirectoryExists(public_path($folderPath));
        $file->move(public_path($folderPath), $filename);
        
        return [
            'path' => $folderPath . '/' . $filename,
            'original_name' => $originalName . '.' . $extension,
        ];
    }

    /**
     * Delete a file if it exists.
     *
     * @param string|null $filePath
     * @return bool
     */
    protected function deleteFileIfExists($filePath)
    {
        if ($filePath && file_exists(public_path($filePath))) {
            return File::delete(public_path($filePath));
        }
        return false;
    }
}

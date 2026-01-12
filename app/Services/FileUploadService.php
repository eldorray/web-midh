<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class FileUploadService
{
    /**
     * Image extensions that can be compressed
     */
    protected array $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    /**
     * Default compression quality (1-100)
     */
    protected int $defaultQuality = 80;

    /**
     * Default max width for images
     */
    protected int $defaultMaxWidth = 1920;

    /**
     * Upload a file with optional image compression
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string $disk
     * @param bool $compress
     * @param int|null $quality
     * @param int|null $maxWidth
     * @return string The stored path
     */
    public function upload(
        UploadedFile $file,
        string $folder,
        string $disk = 'public',
        bool $compress = true,
        ?int $quality = null,
        ?int $maxWidth = null
    ): string {
        $extension = strtolower($file->getClientOriginalExtension());

        // If it's an image and compression is enabled, compress it
        if ($compress && $this->isImage($extension)) {
            return $this->uploadCompressedImage(
                $file,
                $folder,
                $disk,
                $quality ?? $this->defaultQuality,
                $maxWidth ?? $this->defaultMaxWidth
            );
        }

        // For non-image files or when compression is disabled, use standard upload
        return $file->store($folder, $disk);
    }

    /**
     * Upload and compress an image file
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string $disk
     * @param int $quality
     * @param int $maxWidth
     * @return string The stored path
     */
    protected function uploadCompressedImage(
        UploadedFile $file,
        string $folder,
        string $disk,
        int $quality,
        int $maxWidth
    ): string {
        // Generate unique filename with webp extension for better compression
        $filename = Str::uuid() . '.webp';
        $path = $folder . '/' . $filename;

        // Create image instance and process
        $image = Image::read($file);

        // Resize if larger than max width (maintaining aspect ratio)
        if ($image->width() > $maxWidth) {
            $image->scale(width: $maxWidth);
        }

        // Encode to WebP format with specified quality
        $encoded = $image->toWebp($quality);

        // Store the compressed image
        Storage::disk($disk)->put($path, (string) $encoded);

        return $path;
    }

    /**
     * Delete a file from storage
     *
     * @param string|null $path
     * @param string $disk
     * @return bool
     */
    public function delete(?string $path, string $disk = 'public'): bool
    {
        if (empty($path)) {
            return false;
        }

        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }

    /**
     * Replace an existing file with a new one
     *
     * @param UploadedFile $file
     * @param string|null $existingPath
     * @param string $folder
     * @param string $disk
     * @param bool $compress
     * @param int|null $quality
     * @param int|null $maxWidth
     * @return string The new stored path
     */
    public function replace(
        UploadedFile $file,
        ?string $existingPath,
        string $folder,
        string $disk = 'public',
        bool $compress = true,
        ?int $quality = null,
        ?int $maxWidth = null
    ): string {
        // Delete the existing file first
        $this->delete($existingPath, $disk);

        // Upload the new file
        return $this->upload($file, $folder, $disk, $compress, $quality, $maxWidth);
    }

    /**
     * Check if a file extension is an image
     *
     * @param string $extension
     * @return bool
     */
    protected function isImage(string $extension): bool
    {
        return in_array($extension, $this->imageExtensions);
    }

    /**
     * Upload without compression (for cases where original quality is needed)
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string $disk
     * @return string
     */
    public function uploadOriginal(UploadedFile $file, string $folder, string $disk = 'public'): string
    {
        return $this->upload($file, $folder, $disk, false);
    }

    /**
     * Get the full URL for a stored file
     *
     * @param string|null $path
     * @param string $disk
     * @return string|null
     */
    public function getUrl(?string $path, string $disk = 'public'): ?string
    {
        if (empty($path)) {
            return null;
        }

        return Storage::disk($disk)->url($path);
    }
}

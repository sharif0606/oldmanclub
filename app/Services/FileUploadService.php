<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Models\User\PostFile;
use App\Models\User\SalePostFile;
use Exception;

class FileUploadService
{
    /**
     * Handle file upload for posts
     *
     * @param UploadedFile $file
     * @param int $postId
     * @return PostFile|null
     * @throws Exception
     */
    public function uploadPostFile($file, int $postId)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $filefolder = date('Y') . '/' . date('m');
            $fileName = $this->generateFileName($extension);

            // Determine file type and directory
            $fileInfo = $this->determineFileType($mimeType);
            if (!$fileInfo) {
                return null; // Skip unsupported file types
            }

            $directory = $fileInfo['directory'];
            $fileType = $fileInfo['type'];

            // Create directory if it doesn't exist
            $uploadPath = $this->createUploadDirectory('post', $directory, $filefolder);

            // Move file to appropriate directory
            $file->move($uploadPath, $fileName);
            
            // Get file size after moving
            $fullPath = $uploadPath . '/' . $fileName;
            $fileSize = file_exists($fullPath) ? filesize($fullPath) : 0;

            return PostFile::create([
                'post_id' => $postId,
                'file_name' => $fileName,
                'file_type' => $fileType,
                'file_size' => $fileSize,
                'file_path' => $directory . '/' . $filefolder . '/' . $fileName
            ]);

        } catch (Exception $e) {
            throw new Exception('File upload failed: ' . $e->getMessage());
        }
    }

    /**
     * Handle file upload for sale posts
     *
     * @param UploadedFile $file
     * @param int $salePostId
     * @return SalePostFile|null
     * @throws Exception
     */
    public function uploadSalePostFile($file, int $salePostId)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $filefolder = date(format: 'Y') . '/' . date('m');
            $fileName = $this->generateFileName($extension);

            // Determine file type and directory
            $fileInfo = $this->determineFileType($mimeType);
            if (!$fileInfo) {
                return null; // Skip unsupported file types
            }

            $directory = $fileInfo['directory'];
            $fileType = $fileInfo['type'];

            // Create directory if it doesn't exist
            $uploadPath = $this->createUploadDirectory('sale_post', $directory, $filefolder);

            // Move file to appropriate directory
            $file->move($uploadPath, $fileName);
            
            // Get file size after moving
            $fullPath = $uploadPath . '/' . $fileName;
            $fileSize = file_exists($fullPath) ? filesize($fullPath) : 0;

            return SalePostFile::create([
                'sale_post_id' => $salePostId,
                'file_name' => $fileName,
                'file_type' => $fileType,
                'file_size' => $fileSize,
                'file_path' => $directory . '/' . $filefolder . '/' . $fileName
            ]);
        }
        catch (Exception $e) {
            throw new Exception('File upload failed: ' . $e->getMessage());
        }
       
    }

    /**
     * Generate unique filename
     *
     * @param string $extension
     * @return string
     */
    private function generateFileName(string $extension): string
    {
        return rand(1111, 9999) . Auth::user()->id . '_' . rand(111, 999) . time() . '.' . $extension;
    }

    /**
     * Determine file type and directory based on MIME type
     *
     * @param string $mimeType
     * @return array|null
     */
    private function determineFileType(string $mimeType): ?array
    {
        if (str_starts_with($mimeType, 'image/')) {
            return [
                'directory' => 'images',
                'type' => 'image'
            ];
        } elseif (str_starts_with($mimeType, 'video/')) {
            return [
                'directory' => 'videos',
                'type' => 'video'
            ];
        }

        return null; // Unsupported file type
    }

    /**
     * Create upload directory if it doesn't exist
     *
     * @param string $directory
     * @param string $filefolder
     * @return string
     */
    private function createUploadDirectory(string $type, string $directory, string $filefolder): string
    {
        $uploadPath = public_path('uploads/' . $type . '/' . $directory . '/' . $filefolder);
        
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        return $uploadPath;
    }



    /**
     * Delete file from storage
     *
     * @param string $filePath
     * @return bool
     */
    public function deleteFile(string $type, string $filePath): bool
    {
        $fullPath = public_path('uploads/' . $type . '/' . $filePath);
        
        if (file_exists($fullPath)) {
            return unlink($fullPath);
        }

        return false;
    }

    /**
     * Get supported file types
     *
     * @return array
     */
    public function getSupportedFileTypes(): array
    {
        return [
            'image' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
            'video' => ['video/mp4', 'video/avi', 'video/mov', 'video/wmv']
        ];
    }
} 
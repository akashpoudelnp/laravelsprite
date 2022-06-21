<?php

namespace App\Services;

class UploadService
{
    public function upload($file)
    {
        $path = $file->store('public/images');
        $path = str_replace('public', 'storage', $path);
        return $path;
    }

    public function delete($path)
    {
        $path = str_replace('storage', 'public', $path);
        \Storage::delete($path);
    }
}

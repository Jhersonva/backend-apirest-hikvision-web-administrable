<?php

namespace App\Services\Image;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class ImageService
{
    public function getAll(): Collection
    {
        return Image::with('category')->get();
    }

    public function create(array $data): Image
    {
        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            $path = $data['file']->store('images', 'public');
            $data['file_path'] = $path;
        }

        unset($data['file']);

        return Image::create($data)->load('category');
    }

    /*
    public function update(Image $image, array $data): Image
    {
        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            if ($image->file_path && Storage::disk('public')->exists($image->file_path)) {
                Storage::disk('public')->delete($image->file_path);
            }
            $path = $data['file']->store('images', 'public');
            $data['file_path'] = $path;
        } else {
            unset($data['file']);
        }

        $image->update($data);

        return $image->refresh()->load('category');
    }*/

    public function delete(Image $image): bool
    {
        if ($image->file_path && Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
        }

        return $image->delete();
    }
}
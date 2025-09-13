<?php

namespace App\Services\ImageCategory;

use App\Models\ImageCategory;
use Illuminate\Support\Facades\Storage;

class ImageCategoryService
{
    public function getAll()
    {
        return ImageCategory::all();
    }

    public function getById($id)
    {
        return ImageCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        return ImageCategory::create($data);
    }

    public function update($id, array $data)
    {
        $category = ImageCategory::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = ImageCategory::with('images')->findOrFail($id);

        // Eliminar imágenes asociadas y sus archivos
        foreach ($category->images as $image) {
            if ($image->file_path && Storage::disk('public')->exists($image->file_path)) {
                Storage::disk('public')->delete($image->file_path);
            }
            $image->delete();
        }

        // Finalmente eliminar la categoría
        return $category->delete();
    }
}
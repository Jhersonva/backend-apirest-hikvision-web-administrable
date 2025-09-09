<?php

namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    public function getAll()
    {
        return Blog::all();
    }

    public function create(array $data): Blog
    {
        // Guardar imagen
        if (isset($data['img_blog']) && $data['img_blog'] instanceof UploadedFile) {
            $path = $data['img_blog']->store('blogs', 'public');
            $data['img_blog'] = $path;
        }

        return Blog::create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        // Si hay nueva imagen reemplazar
        if (isset($data['img_blog']) && $data['img_blog'] instanceof UploadedFile) {
            if ($blog->img_blog && Storage::disk('public')->exists($blog->img_blog)) {
                Storage::disk('public')->delete($blog->img_blog);
            }
            $path = $data['img_blog']->store('blogs', 'public');
            $data['img_blog'] = $path;
        } else {
            unset($data['img_blog']);
        }

        $blog->update($data);

        return $blog->refresh();
    }

    public function delete(Blog $blog): bool
    {
        if ($blog->img_blog && Storage::disk('public')->exists($blog->img_blog)) {
            Storage::disk('public')->delete($blog->img_blog);
        }

        return $blog->delete();
    }
}

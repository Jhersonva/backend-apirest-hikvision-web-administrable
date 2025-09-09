<?php

namespace App\Services\Testimonial;

use App\Models\Testimonial;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TestimonialService
{
    public function getAll()
    {
        return Testimonial::all();
    }

    public function create(array $data): Testimonial
    {
        if (isset($data['img_testimonial']) && $data['img_testimonial'] instanceof UploadedFile) {
            $path = $data['img_testimonial']->store('testimonials', 'public');
            $data['img_testimonial'] = $path;
        }

        return Testimonial::create($data);
    }

    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        if (isset($data['img_testimonial']) && $data['img_testimonial'] instanceof UploadedFile) {
            // Eliminar imagen anterior
            if ($testimonial->img_testimonial && Storage::disk('public')->exists($testimonial->img_testimonial)) {
                Storage::disk('public')->delete($testimonial->img_testimonial);
            }

            $path = $data['img_testimonial']->store('testimonials', 'public');
            $data['img_testimonial'] = $path;
        } else {
            unset($data['img_testimonial']);
        }

        $testimonial->update($data);

        return $testimonial->refresh();
    }

    public function delete(Testimonial $testimonial): bool
    {
        if ($testimonial->img_testimonial && Storage::disk('public')->exists($testimonial->img_testimonial)) {
            Storage::disk('public')->delete($testimonial->img_testimonial);
        }

        return $testimonial->delete();
    }
}

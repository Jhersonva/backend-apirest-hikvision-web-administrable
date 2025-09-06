<?php

namespace App\Services;

use App\Models\Carousel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CarouselService
{
    public function getAll()
    {
        return Carousel::all();
    }

    public function create(array $data): Carousel
    {
        if (isset($data['img_carousel']) && $data['img_carousel'] instanceof UploadedFile) {
            $path = $data['img_carousel']->store('carousels', 'public');
            $data['img_carousel'] = $path;
        }

        return Carousel::create($data);
    }

    public function update(Carousel $carousel, array $data): Carousel
    {
        if (isset($data['img_carousel']) && $data['img_carousel'] instanceof UploadedFile) {
            // Eliminar imagen anterior si existe
            if ($carousel->img_carousel && Storage::disk('public')->exists($carousel->img_carousel)) {
                Storage::disk('public')->delete($carousel->img_carousel);
            }

            $path = $data['img_carousel']->store('carousels', 'public');
            $data['img_carousel'] = $path;
        } else {
            unset($data['img_carousel']); 
        }

        $carousel->update($data);

        return $carousel;
    }

    public function delete(Carousel $carousel): bool
    {
        if ($carousel->img_carousel && Storage::disk('public')->exists($carousel->img_carousel)) {
            Storage::disk('public')->delete($carousel->img_carousel);
        }

        return $carousel->delete();
    }
}

<?php 
// app/Services/CounterServiceMainImageService.php
namespace App\Services;

use App\Models\CounterServiceMainImage;
use Illuminate\Support\Facades\Storage;

class CounterServiceMainImageService
{
    public function get()
    {
        return CounterServiceMainImage::first();
    }

    public function update($request)
    {
        $mainImage = CounterServiceMainImage::first();

        // Si no existe, lo creamos
        if (!$mainImage) {
            $mainImage = CounterServiceMainImage::create([
                'main_img' => null
            ]);
        }

        if ($request->hasFile('main_img')) {
            // Elimina la anterior si existe
            if ($mainImage->main_img && Storage::disk('public')->exists($mainImage->main_img)) {
                Storage::disk('public')->delete($mainImage->main_img);
            }

            // Guarda la nueva
            $path = $request->file('main_img')->store('counter_services', 'public');
            $mainImage->main_img = $path;
            $mainImage->save();
        }

        return $mainImage;
    }
}
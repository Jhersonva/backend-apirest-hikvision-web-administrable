<?php

namespace App\Services\BannerPage;

use App\Models\BannerPage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BannerPageService
{
    /**
     * Obtener todos los banners (máximo 3 registros).
     */
    public function getAll()
    {
        return BannerPage::limit(3)->get();
    }

    /**
     * Actualizar un banner específico.
     */
    public function update(BannerPage $banner, array $data): BannerPage
    {
        // Manejo de imagen
        if (isset($data['img_banner_page']) && $data['img_banner_page'] instanceof UploadedFile) {
            // eliminar imagen anterior si existe
            if ($banner->img_banner_page && Storage::disk('public')->exists($banner->img_banner_page)) {
                Storage::disk('public')->delete($banner->img_banner_page);
            }
            $path = $data['img_banner_page']->store('banner_pages', 'public');
            $data['img_banner_page'] = $path;
        } else {
            unset($data['img_banner_page']);
        }

        $banner->update($data);

        return $banner->refresh();
    }
}

<?php

namespace App\Services\Partner;

use App\Models\Partner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PartnerService
{
    public function getAll()
    {
        return Partner::all();
    }

    public function create(array $data): Partner
    {
        // Subir imagen si existe
        if (isset($data['img_partner']) && $data['img_partner'] instanceof UploadedFile) {
            $path = $data['img_partner']->store('partners', 'public');
            $data['img_partner'] = $path;
        }

        return Partner::create($data);
    }

    public function update(Partner $partner, array $data): Partner
    {
        // Imagen nueva → eliminar anterior y guardar
        if (isset($data['img_partner']) && $data['img_partner'] instanceof UploadedFile) {
            if ($partner->img_partner && Storage::disk('public')->exists($partner->img_partner)) {
                Storage::disk('public')->delete($partner->img_partner);
            }
            $path = $data['img_partner']->store('partners', 'public');
            $data['img_partner'] = $path;
        } else {
            unset($data['img_partner']);
        }

        $partner->update($data);

        return $partner->refresh();
    }

    public function delete(Partner $partner): bool
    {
        if ($partner->img_partner && Storage::disk('public')->exists($partner->img_partner)) {
            Storage::disk('public')->delete($partner->img_partner);
        }

        return $partner->delete();
    }
}

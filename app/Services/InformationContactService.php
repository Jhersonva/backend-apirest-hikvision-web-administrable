<?php

namespace App\Services;

use App\Models\InformationContact;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class InformationContactService
{
    public function getInfo()
    {
        return InformationContact::first();
    }

    public function updateInfo(array $data)
    {
        $info = InformationContact::first();

        if (!$info) {
            $info = new InformationContact();
        }

        // Si viene una imagen la guardamos
        if (isset($data['img_information_contact']) && $data['img_information_contact'] instanceof UploadedFile) {
            // Eliminar la imagen anterior si existe
            if ($info->img_information_contact && Storage::disk('public')->exists($info->img_information_contact)) {
                Storage::disk('public')->delete($info->img_information_contact);
            }

            $path = $data['img_information_contact']->store('information_contact', 'public');
            $data['img_information_contact'] = $path;
        }

        $info->fill($data)->save();

        return $info;
    }
}

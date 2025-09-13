<?php

namespace App\Services;

use App\Models\SocialNetwork;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SocialNetworkService
{
    public function getAll()
    {
        return SocialNetwork::all();
    }

    public function create(array $data): SocialNetwork
    {
        if (isset($data['icon_img']) && $data['icon_img'] instanceof UploadedFile) {
            $path = $data['icon_img']->store('social_networks', 'public');
            $data['icon_img'] = $path; 
        } elseif (isset($data['icon_url'])) {
            // Guardar la URL directamente como icon_img
            // Se puede guardar tal cual si tu accessor ya lo maneja
            $data['icon_img'] = $data['icon_url'];
        }

        return SocialNetwork::create($data);
    }

    public function update(SocialNetwork $socialNetwork, array $data): SocialNetwork
    {
        if (isset($data['icon_img']) && $data['icon_img'] instanceof UploadedFile) {
            if ($socialNetwork->icon_img && Storage::disk('public')->exists($socialNetwork->icon_img)) {
                Storage::disk('public')->delete($socialNetwork->icon_img);
            }
            $path = $data['icon_img']->store('social_networks', 'public');
            $data['icon_img'] = $path; 
        } elseif (isset($data['icon_url'])) {
            // Guardar la URL directamente
            $data['icon_img'] = $data['icon_url'];
        } else {
            unset($data['icon_img']); // No se actualiza nada
        }

        $socialNetwork->update($data);

        return $socialNetwork->refresh(); 
    }

    public function delete(SocialNetwork $socialNetwork): bool
    {
        if ($socialNetwork->icon_img && Storage::disk('public')->exists($socialNetwork->icon_img)) {
            Storage::disk('public')->delete($socialNetwork->icon_img);
        }

        return $socialNetwork->delete();
    }
}
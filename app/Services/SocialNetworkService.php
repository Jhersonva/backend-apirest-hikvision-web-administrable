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
        } else {
            unset($data['icon_img']); 
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
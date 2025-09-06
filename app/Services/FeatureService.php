<?php

namespace App\Services;

use App\Models\Feature;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FeatureService
{
    public function getAll()
    {
        return Feature::all();
    }

    public function create(array $data): Feature
    {
        if (isset($data['icon_img_feature']) && $data['icon_img_feature'] instanceof UploadedFile) {
            $path = $data['icon_img_feature']->store('features', 'public');
            $data['icon_img_feature'] = $path;
        }

        return Feature::create($data);
    }

    public function update(Feature $feature, array $data): Feature
    {
        if (isset($data['icon_img_feature']) && $data['icon_img_feature'] instanceof UploadedFile) {
            // eliminar imagen anterior si existe
            if ($feature->icon_img_feature && Storage::disk('public')->exists($feature->icon_img_feature)) {
                Storage::disk('public')->delete($feature->icon_img_feature);
            }

            $path = $data['icon_img_feature']->store('features', 'public');
            $data['icon_img_feature'] = $path;
        } else {
            unset($data['icon_img_feature']);
        }

        $feature->update($data);

        return $feature->refresh();
    }

    public function delete(Feature $feature): bool
    {
        if ($feature->icon_img_feature && Storage::disk('public')->exists($feature->icon_img_feature)) {
            Storage::disk('public')->delete($feature->icon_img_feature);
        }

        return $feature->delete();
    }
}

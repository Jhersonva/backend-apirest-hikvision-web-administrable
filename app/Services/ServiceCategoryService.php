<?php

namespace App\Services;

use App\Models\ServiceCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryService
{
    public function getAll()
    {
        return ServiceCategory::all();
    }

    public function create(array $data): ServiceCategory
    {
        if (isset($data['icon_service_category']) && $data['icon_service_category'] instanceof UploadedFile) {
            $path = $data['icon_service_category']->store('service_categories', 'public');
            $data['icon_service_category'] = $path;
        }

        return ServiceCategory::create($data);
    }

    public function update(ServiceCategory $serviceCategory, array $data): ServiceCategory
    {
        if (isset($data['icon_service_category']) && $data['icon_service_category'] instanceof UploadedFile) {
            // eliminar imagen anterior si existe
            if ($serviceCategory->icon_service_category && Storage::disk('public')->exists($serviceCategory->icon_service_category)) {
                Storage::disk('public')->delete($serviceCategory->icon_service_category);
            }

            $path = $data['icon_service_category']->store('service_categories', 'public');
            $data['icon_service_category'] = $path;
        } else {
            unset($data['icon_service_category']);
        }

        $serviceCategory->update($data);

        return $serviceCategory->refresh();
    }

    public function delete(ServiceCategory $serviceCategory): bool
    {
        if ($serviceCategory->icon_service_category && Storage::disk('public')->exists($serviceCategory->icon_service_category)) {
            Storage::disk('public')->delete($serviceCategory->icon_service_category);
        }

        return $serviceCategory->delete();
    }
}

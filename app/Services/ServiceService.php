<?php 

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ServiceService
{
    public function getAll()
    {
        return Service::with('category')->get();
    }

    public function create(array $data): Service
    {
        if (isset($data['icon_service']) && $data['icon_service'] instanceof UploadedFile) {
            $path = $data['icon_service']->store('servics', 'public');
            $data['icon_service'] = $path;
        }

        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        if (isset($data['icon_service']) && $data['icon_service'] instanceof UploadedFile) {
            // Eliminar imagen anterior si existe
            if ($service->icon_service && Storage::disk('public')->exists($service->icon_service)) {
                Storage::disk('public')->delete($service->icon_service);
            }

            $path = $data['icon_service']->store('servics', 'public');
            $data['icon_service'] = $path;
        } else {
            unset($data['icon_service']);
        }

        $service->update($data);

        return $service->refresh();
    }

    public function delete(Service $service): bool
    {
        if ($service->icon_service && Storage::disk('public')->exists($service->icon_service)) {
            Storage::disk('public')->delete($service->icon_service);
        }

        return $service->delete();
    }
}

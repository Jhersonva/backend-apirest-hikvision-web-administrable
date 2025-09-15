<?php

namespace App\Services;

use App\Models\CounterService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CounterServiceService
{
    public function getAll()
    {
        return CounterService::all();
    }

    public function updateInfo(int $id, array $data)
    {
        $counter = CounterService::findOrFail($id);

        // Guardado de main_img
        /*
        if (isset($data['main_img']) && $data['main_img'] instanceof UploadedFile) {
            if ($counter->main_img && Storage::disk('public')->exists($counter->main_img)) {
                Storage::disk('public')->delete($counter->main_img);
            }
            $path = $data['main_img']->store('counter_services', 'public');
            $data['main_img'] = $path;
        }*/

        // Guardado de icon_img
        if (isset($data['icon_img']) && $data['icon_img'] instanceof UploadedFile) {
            if ($counter->icon_img && Storage::disk('public')->exists($counter->icon_img)) {
                Storage::disk('public')->delete($counter->icon_img);
            }
            $path = $data['icon_img']->store('counter_services', 'public');
            $data['icon_img'] = $path;
        }

        $counter->fill($data)->save();

        return $counter;
    }
}

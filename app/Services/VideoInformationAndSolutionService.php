<?php

namespace App\Services;

use App\Models\VideoInformationAndSolution;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VideoInformationAndSolutionService
{
    // Obtener todos
    public function getAll()
    {
        return VideoInformationAndSolution::all();
    }

    // Actualizar (respetando la regla de url_video_yt)
    public function update(int $id, array $data)
    {
        $video = VideoInformationAndSolution::findOrFail($id);

        // Solo el primer registro puede tener url_video_yt
        if ($video->id !== 1) {
            unset($data['url_video_yt']);
        }

        // Manejo de imagen
        if (isset($data['icon_img']) && $data['icon_img'] instanceof UploadedFile) {
            if ($video->icon_img && Storage::disk('public')->exists($video->icon_img)) {
                Storage::disk('public')->delete($video->icon_img);
            }
            $data['icon_img'] = $data['icon_img']->store('video_information', 'public');
        }

        $video->update($data);

        return $video;
    }
}
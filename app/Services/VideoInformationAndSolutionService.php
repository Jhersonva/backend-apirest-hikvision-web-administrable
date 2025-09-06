<?php

namespace App\Services;

use App\Models\VideoInformationAndSolution;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VideoInformationAndSolutionService
{
    public function getInfo()
    {
        return VideoInformationAndSolution::first();
    }

    public function updateInfo(array $data)
    {
        $video = VideoInformationAndSolution::first();

        if (!$video) {
            $video = new VideoInformationAndSolution();
        }

        // Si viene una imagen la guardamos
        if (isset($data['icon_img']) && $data['icon_img'] instanceof UploadedFile) {
            if ($video->icon_img && Storage::disk('public')->exists($video->icon_img)) {
                Storage::disk('public')->delete($video->icon_img);
            }
            $path = $data['icon_img']->store('video_information', 'public');
            $data['icon_img'] = $path;
        }

        $video->fill($data)->save();

        return $video;
    }
}

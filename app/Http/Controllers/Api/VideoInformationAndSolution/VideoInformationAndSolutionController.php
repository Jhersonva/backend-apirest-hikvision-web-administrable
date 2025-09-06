<?php

namespace App\Http\Controllers\Api\VideoInformationAndSolution;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoInformationAndSolution\UpdateVideoInformationAndSolutionRequest;
use App\Services\VideoInformationAndSolutionService;
use Illuminate\Http\Request;

class VideoInformationAndSolutionController extends Controller
{
    protected $service;

    public function __construct(VideoInformationAndSolutionService $service)
    {
        $this->service = $service;
    }

    // Obtener info
    public function getInfo()
    {
        return response()->json($this->service->getInfo());
    }

    // Actualizar info + imagen
    public function update(UpdateVideoInformationAndSolutionRequest $request)
    {
        $video = $this->service->updateInfo($request->all());
        return response()->json($video);
    }
}

<?php

namespace App\Http\Controllers\Api\VideoInformationAndSolution;

use App\Http\Controllers\Controller;
use App\Services\VideoInformationAndSolutionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideoInformationAndSolutionController extends Controller
{
    protected $service;

    public function __construct(VideoInformationAndSolutionService $service)
    {
        $this->service = $service;
    }

    // GET /api/video-information-and-solution
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll(), 200);
    }

    // PUT /api/video-information-and-solution/{id}
    public function update(Request $request, int $id): JsonResponse
    {
        $video = $this->service->update($id, $request->all());

        return response()->json($video, 200);
    }
}
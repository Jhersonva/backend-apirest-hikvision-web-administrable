<?php

namespace App\Http\Controllers\Api\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\DeleteImageRequest;
use App\Services\Image\ImageService;
use App\Models\Image;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    protected $service;

    public function __construct(ImageService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $images = $this->service->getAll();
        return response()->json($images);
    }

    public function store(StoreImageRequest $request): JsonResponse
    {
        $image = $this->service->create($request->validated() + ['file' => $request->file('file')]);
        return response()->json($image, 201);
    }

    public function destroy($id): JsonResponse
    {
        $image = Image::findOrFail($id);
        $this->service->delete($image);
        return response()->json(['message' => 'Imagen eliminada con exito']);
    }
}

<?php

namespace App\Http\Controllers\Api\Carousel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carousel\StoreCarouselRequest;
use App\Http\Requests\Carousel\UpdateCarouselRequest;
use App\Models\Carousel;
use App\Services\CarouselService;
use Illuminate\Http\JsonResponse;

class CarouselController extends Controller
{
    protected CarouselService $service;

    public function __construct(CarouselService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreCarouselRequest $request): JsonResponse
    {
        $carousel = $this->service->create($request->validated());
        return response()->json($carousel, 201);
    }

    public function update(UpdateCarouselRequest $request, Carousel $id): JsonResponse
    {
        $updated = $this->service->update($id, $request->validated());
        return response()->json($updated);
    }

    public function destroy(Carousel $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Imagen del carrusel eliminada correctamente']);
    }
}

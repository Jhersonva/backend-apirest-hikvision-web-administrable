<?php

namespace App\Http\Controllers\Api\ImageCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageCategory\StoreImageCategoryRequest;
use App\Http\Requests\ImageCategory\UpdateImageCategoryRequest;
use App\Services\ImageCategory\ImageCategoryService;
use Illuminate\Http\JsonResponse;

class ImageCategoryController extends Controller
{
    protected $service;

    public function __construct(ImageCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $categories = $this->service->getAll();
        return response()->json($categories, 200);
    }

    public function show($id): JsonResponse
    {
        $category = $this->service->getById($id);
        return response()->json($category, 200);
    }

    public function store(StoreImageCategoryRequest $request): JsonResponse
    {
        $category = $this->service->create($request->validated());
        return response()->json($category, 201);
    }

    public function update(UpdateImageCategoryRequest $request, $id): JsonResponse
    {
        $category = $this->service->update($id, $request->validated());
        return response()->json($category, 200);
    }

    public function destroy($id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Categoría eliminada correctamente'], 200);
    }
}
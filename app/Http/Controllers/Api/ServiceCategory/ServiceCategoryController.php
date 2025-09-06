<?php

namespace App\Http\Controllers\Api\ServiceCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategory\StoreServiceCategoryRequest;
use App\Http\Requests\ServiceCategory\UpdateServiceCategoryRequest;
use App\Models\ServiceCategory;
use App\Services\ServiceCategoryService;
use Illuminate\Http\JsonResponse;

class ServiceCategoryController extends Controller
{
    protected ServiceCategoryService $service;

    public function __construct(ServiceCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return response()->json($data);
    }

    public function store(StoreServiceCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $serviceCategory = $this->service->create($data);

        return response()->json($serviceCategory, 201);
    }

    public function update(UpdateServiceCategoryRequest $request, $id): JsonResponse
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        $data = $request->validated();
        $serviceCategory = $this->service->update($serviceCategory, $data);

        return response()->json($serviceCategory);
    }

    public function destroy($id): JsonResponse
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        $this->service->delete($serviceCategory);

        return response()->json(['message' => 'Categoria eliminada correctamente']);
    }
}

<?php

namespace App\Http\Controllers\Api\PortfolioCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCategory\StorePortfolioCategoryRequest;
use App\Http\Requests\PortfolioCategory\UpdatePortfolioCategoryRequest;
use App\Models\PortfolioCategory;
use App\Services\PortfolioCategoryService;
use Illuminate\Http\JsonResponse;

class PortfolioCategoryController extends Controller
{
    protected PortfolioCategoryService $service;

    public function __construct(PortfolioCategoryService $service)
    {
        $this->service = $service;
    }

    // GET → listar todas
    public function index(): JsonResponse
    {
        $categories = $this->service->getAll();
        return response()->json($categories);
    }

    // POST → crear
    public function store(StorePortfolioCategoryRequest $request): JsonResponse
    {
        $category = $this->service->create($request->validated());
        return response()->json($category, 201);
    }

    // PUT → actualizar
    public function update(UpdatePortfolioCategoryRequest $request, PortfolioCategory $id): JsonResponse
    {
        $category = $this->service->update($id, $request->validated());
        return response()->json($category);
    }

    // DELETE → eliminar
    public function destroy(PortfolioCategory $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Categoría de Portfolio eliminada con éxito']);
    }
}

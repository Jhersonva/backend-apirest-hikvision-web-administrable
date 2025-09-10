<?php

namespace App\Http\Controllers\Api\CategoryProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryProduct\StoreCategoryProductRequest;
use App\Http\Requests\CategoryProduct\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;
use App\Services\CategoryProduct\CategoryProductService;
use Illuminate\Http\JsonResponse;

class CategoryProductController extends Controller
{
    protected CategoryProductService $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->categoryProductService->getAll());
    }

    public function store(StoreCategoryProductRequest $request): JsonResponse
    {
        $categoryProduct = $this->categoryProductService->create($request->validated());
        return response()->json($categoryProduct, 201);
    }

    public function update(UpdateCategoryProductRequest $request, int $id): JsonResponse
    {
        $categoryProduct = CategoryProduct::findOrFail($id);

        $updated = $this->categoryProductService->update($categoryProduct, $request->validated());
        return response()->json($updated);
    }

    public function destroy(int $id): JsonResponse
    {
        $categoryProduct = CategoryProduct::findOrFail($id);

        $this->categoryProductService->delete($categoryProduct);
        return response()->json(['message' => 'Category Product deleted successfully']);
    }
}

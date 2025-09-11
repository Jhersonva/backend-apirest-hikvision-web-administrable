<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->service->create($request->validated());
        return response()->json($product, 201);
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $updated = $this->service->update($product, $request->validated());
        return response()->json($updated);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $this->service->delete($product);
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
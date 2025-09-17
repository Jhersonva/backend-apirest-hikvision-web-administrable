<?php

namespace App\Http\Controllers\Api\ProductInstallation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInstallation\StoreProductInstallationRequest;
use App\Http\Requests\ProductInstallation\UpdateProductInstallationRequest;
use App\Models\Product;
use App\Models\ProductInstallation;
use App\Services\ProductInstallation\ProductInstallationService;
use Illuminate\Http\JsonResponse;

class ProductInstallationController extends Controller
{
    protected ProductInstallationService $service;

    public function __construct(ProductInstallationService $service)
    {
        $this->service = $service;
    }

    // GET /api/products/{productId}/installation
    public function show(int $productId): JsonResponse
    {
        $product = Product::with('productInstallation')->findOrFail($productId);

        if (!$product->productInstallation) {
            return response()->json([
                'message' => 'Este producto no tiene instalación registrada'
            ], 404);
        }

        return response()->json($product->productInstallation, 200);
    }

    // POST /api/products/{productId}/installation
    public function store(StoreProductInstallationRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);

        if ($product->productInstallation) {
            return response()->json(['error' => 'Este producto ya tiene una instalación'], 400);
        }

        $installation = $this->service->create($product, $request->validated());

        return response()->json([
            'message' => 'Instalación creada con éxito',
            'data' => $installation->toArray(),
        ], 201);
    }

    // PUT /api/products/{productId}/installation
    public function update(UpdateProductInstallationRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $installation = $product->productInstallation;

        if (!$installation) {
            return response()->json(['error' => 'No existe instalación para este producto'], 404);
        }

        $installation = $this->service->update($installation, $request->validated());

        return response()->json([
            'message' => 'Instalación actualizada con éxito',
            'data' => $installation->toArray(),
        ]);
    }
}
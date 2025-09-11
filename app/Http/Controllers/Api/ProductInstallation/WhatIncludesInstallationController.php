<?php

namespace App\Http\Controllers\Api\ProductInstallation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInstallation\StoreWhatIncludeRequest;
use App\Http\Requests\ProductInstallation\UpdateWhatIncludeRequest;
use App\Models\Product;
use App\Services\ProductInstallation\ProductInstallationIncludesService;
use Illuminate\Http\JsonResponse;
use OutOfBoundsException;

class WhatIncludesInstallationController extends Controller
{
    protected ProductInstallationIncludesService $service;

    public function __construct(ProductInstallationIncludesService $service)
    {
        $this->service = $service;
    }

    // GET /api/products/{productId}/installation/what-includes
    public function index(int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $installation = $product->productInstallation;

        if (!$installation) {
            return response()->json(['error' => 'No existe instalación para este producto'], 404);
        }

        return response()->json(['what_includes' => $this->service->list($installation)]);
    }

    // POST /api/products/{productId}/installation/what-includes
    public function store(StoreWhatIncludeRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $installation = $product->productInstallation;

        if (!$installation) {
            return response()->json(['error' => 'No existe instalación para este producto'], 404);
        }

        $items = $this->service->add($installation, $request->validated()['item']);

        return response()->json([
            'message' => 'Item agregado',
            'what_includes' => $items,
            'index' => count($items) - 1,
        ], 201);
    }

    // PUT /api/products/{productId}/installation/what-includes/{index}
    public function update(UpdateWhatIncludeRequest $request, int $productId, int $index): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $installation = $product->productInstallation;

        if (!$installation) {
            return response()->json(['error' => 'No existe instalación para este producto'], 404);
        }

        try {
            $items = $this->service->updateAt($installation, $index, $request->validated()['item']);
            return response()->json([
                'message' => 'Item actualizado',
                'what_includes' => $items,
            ]);
        } catch (OutOfBoundsException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // DELETE /api/products/{productId}/installation/what-includes/{index}
    public function destroy(int $productId, int $index): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $installation = $product->productInstallation;

        if (!$installation) {
            return response()->json(['error' => 'No existe instalación para este producto'], 404);
        }

        try {
            $items = $this->service->deleteAt($installation, $index);
            return response()->json([
                'message' => 'Item eliminado',
                'what_includes' => $items,
            ]);
        } catch (OutOfBoundsException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

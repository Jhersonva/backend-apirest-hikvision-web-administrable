<?php

namespace App\Http\Controllers\Api\ProductDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetail\StoreWhatIncludeRequest;
use App\Http\Requests\ProductDetail\UpdateWhatIncludeRequest;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Services\ProductDetail\ProductDetailIncludesService;
use Illuminate\Http\JsonResponse;
use OutOfBoundsException;

class WhatIncludesController extends Controller
{
    protected ProductDetailIncludesService $service;

    public function __construct(ProductDetailIncludesService $service)
    {
        $this->service = $service;
    }

    // GET /api/products/{productId}/detail/what-includes
    public function index(int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $detail = $product->productDetail;
        if (!$detail) {
            return response()->json(['error' => 'No existe ProductDetail para este producto'], 404);
        }

        return response()->json(['what_includes' => $this->service->list($detail)]);
    }

    // POST /api/products/{productId}/detail/what-includes
    public function store(StoreWhatIncludeRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $detail = $product->productDetail;
        if (!$detail) {
            return response()->json(['error' => 'No existe ProductDetail para este producto'], 404);
        }

        $items = $this->service->add($detail, $request->validated()['item']);

        return response()->json([
            'message' => 'Item agregado',
            'what_includes' => $items,
            'index' => count($items) - 1,
        ], 201);
    }

    // PUT /api/products/{productId}/detail/what-includes/{index}
    public function update(UpdateWhatIncludeRequest $request, int $productId, int $index): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $detail = $product->productDetail;
        if (!$detail) {
            return response()->json(['error' => 'No existe ProductDetail para este producto'], 404);
        }

        try {
            $items = $this->service->updateAt($detail, $index, $request->validated()['item']);
            return response()->json([
                'message' => 'Item actualizado',
                'what_includes' => $items,
            ]);
        } catch (OutOfBoundsException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // DELETE /api/products/{productId}/detail/what-includes/{index}
    public function destroy(int $productId, int $index): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $detail = $product->productDetail;
        if (!$detail) {
            return response()->json(['error' => 'No existe ProductDetail para este producto'], 404);
        }

        try {
            $items = $this->service->deleteAt($detail, $index);
            return response()->json([
                'message' => 'Item eliminado',
                'what_includes' => $items,
            ]);
        } catch (OutOfBoundsException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
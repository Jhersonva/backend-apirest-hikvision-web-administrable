<?php

namespace App\Http\Controllers\Api\ProductDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetail\StoreProductDetailRequest;
use App\Http\Requests\ProductDetail\UpdateProductDetailRequest;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Services\ProductDetail\ProductDetailService;
use Illuminate\Http\JsonResponse;

class ProductDetailController extends Controller
{
    protected ProductDetailService $productDetailService;

    public function __construct(ProductDetailService $productDetailService)
    {
        $this->productDetailService = $productDetailService;
    }

    // Mostrar detalle de un producto
    public function show(int $productId): JsonResponse
    {
        $product = Product::with('productDetail')->findOrFail($productId);

        if (!$product->productDetail) {
            return response()->json([
                'message' => 'Este producto no tiene detalle registrado'
            ], 404);
        }

        return response()->json($product->productDetail, 200);
    }

    // Crear detalle de un producto
    public function store(StoreProductDetailRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $detail = $this->productDetailService->create($product, $request->validated());

        return response()->json($detail, 201);
    }

    // Actualizar detalle de un producto
    public function update(UpdateProductDetailRequest $request, int $productId): JsonResponse
    {
        $productDetail = ProductDetail::findOrFail($productId);
        $updated = $this->productDetailService->update($productDetail, $request->validated());

        return response()->json($updated);
    }
}
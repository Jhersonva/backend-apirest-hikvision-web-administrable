<?php

namespace App\Services\ProductDetail;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Storage;

class ProductDetailService
{
    public function getByProduct(Product $product): ?ProductDetail
    {
        return $product->productDetail;
    }

    public function create(Product $product, array $data): ProductDetail
    {
        if ($product->productDetail) {
            throw new \Exception("Este producto ya tiene un detalle registrado");
        }

        if (isset($data['img_product_detail'])) {
            $data['img_product_detail'] = $data['img_product_detail']->store('product_details', 'public');
        }

        $data['what_includes'] = $data['what_includes'] ?? [];

        return $product->productDetail()->create($data);
    }

    public function update(ProductDetail $productDetail, array $data): ProductDetail
    {
        if (isset($data['img_product_detail'])) {
            if ($productDetail->img_product_detail && Storage::disk('public')->exists($productDetail->img_product_detail)) {
                Storage::disk('public')->delete($productDetail->img_product_detail);
            }
            $data['img_product_detail'] = $data['img_product_detail']->store('product_details', 'public');
        }

        if (isset($data['what_includes'])) {
            $data['what_includes'] = $data['what_includes'];
        }

        $productDetail->update($data);
        return $productDetail;
    }
}
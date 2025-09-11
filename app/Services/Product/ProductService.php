<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getAll(): Collection
    {
        return Product::with('categoryProduct')->get();
    }

    public function create(array $data): Product
    {
        // Subir imagen si existe
        if (isset($data['img_product']) && $data['img_product'] instanceof UploadedFile) {
            $path = $data['img_product']->store('products', 'public');
            $data['img_product'] = $path;
        }

        // Lógica de oferta
        if ($data['state_offer'] === 'false') {
            $data['offer_price'] = null;
        }

        return Product::create($data)->load('categoryProduct');
    }

    public function update(Product $product, array $data): Product
    {
        // Subir nueva imagen si se actualiza
        if (isset($data['img_product']) && $data['img_product'] instanceof UploadedFile) {
            if ($product->img_product && Storage::disk('public')->exists($product->img_product)) {
                Storage::disk('public')->delete($product->img_product);
            }
            $path = $data['img_product']->store('products', 'public');
            $data['img_product'] = $path;
        } else {
            unset($data['img_product']);
        }

        // Lógica de oferta
        if (isset($data['state_offer']) && $data['state_offer'] === 'false') {
            $data['offer_price'] = null;
        }

        $product->update($data);

        return $product->refresh()->load('categoryProduct');
    }

    public function delete(Product $product): bool
    {
        if ($product->img_product && Storage::disk('public')->exists($product->img_product)) {
            Storage::disk('public')->delete($product->img_product);
        }

        return $product->delete();
    }
}
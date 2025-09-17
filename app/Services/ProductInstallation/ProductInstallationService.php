<?php

namespace App\Services\ProductInstallation;

use App\Models\Product;
use App\Models\ProductInstallation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductInstallationService
{
    public function getByProduct(Product $product): ?ProductInstallation
    {
        return $product->productInstallation; 
    }

    /**
     * Crear un registro de instalación para un producto.
     */
    public function create(Product $product, array $data): ProductInstallation
    {
        return DB::transaction(function () use ($product, $data) {
            // Subida de imagen si existe
            if (isset($data['img_product_installation']) && $data['img_product_installation'] instanceof UploadedFile) {
                $data['img_product_installation'] = $data['img_product_installation']->store('product_installations', 'public');
            }

            return $product->productInstallation()->create([
                'description_product_installation' => $data['description_product_installation'],
                'img_product_installation' => $data['img_product_installation'] ?? null,
                'what_includes' => $data['what_includes'] ?? [],
            ]);
        });
    }

    /**
     * Actualizar el registro de instalación de un producto.
     */
    public function update(ProductInstallation $installation, array $data): ProductInstallation
    {
        return DB::transaction(function () use ($installation, $data) {
            // Subida de imagen si existe
            if (isset($data['img_product_installation']) && $data['img_product_installation'] instanceof UploadedFile) {
                // Eliminar la imagen anterior si existe
                if ($installation->img_product_installation) {
                    Storage::disk('public')->delete($installation->img_product_installation);
                }
                $data['img_product_installation'] = $data['img_product_installation']->store('product_installations', 'public');
            }

            $installation->update([
                'description_product_installation' => $data['description_product_installation'] ?? $installation->description_product_installation,
                'img_product_installation' => $data['img_product_installation'] ?? $installation->img_product_installation,
                'what_includes' => $data['what_includes'] ?? $installation->what_includes,
            ]);

            return $installation;
        });
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;
use App\Models\Product;

class CategoryProductAndProductSeeder extends Seeder
{
    public function run(): void
    {
        // Crear categorías de ejemplo
        $categories = [
            'Electrodomésticos',
            'Tecnología',
            'Hogar',
            'Juguetes',
            'Ropa'
        ];

        foreach ($categories as $categoryName) {
            $category = CategoryProduct::create([
                'name_category_products' => $categoryName,
            ]);

            // Crear productos de ejemplo para cada categoría
            for ($i = 1; $i <= 3; $i++) {
                $stateOffer = random_int(0, 1) ? 'true' : 'false';

                Product::create([
                    'category_product_id' => $category->id,
                    'img_product' => null, 
                    'name_product' => $categoryName . " Producto $i",
                    'state_offer' => $stateOffer,
                    'not_offer_price' => random_int(100, 500),
                    'offer_price' => $stateOffer === 'true' ? random_int(50, 99) : null,
                    'star_quality' => random_int(1, 5),
                ]);
            }
        }
    }
}
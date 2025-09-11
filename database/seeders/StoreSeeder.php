<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\CategoryProduct;
use App\Models\Product;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $category = CategoryProduct::first();
        $product = Product::first();

        Store::firstOrCreate(
            ['id' => 1],
            [
                'category_product_id' => $category ? $category->id : null,
                'product_id' => $product ? $product->id : null,
                'img_store_discount' => null,
                'range_price_start' => 0,
                'range_price_end' => 0,
            ]
        );
    }
}
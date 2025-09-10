<?php

namespace App\Services\CategoryProduct;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Collection;

class CategoryProductService
{
    public function getAll(): Collection
    {
        return CategoryProduct::all();
    }

    public function create(array $data): CategoryProduct
    {
        return CategoryProduct::create($data);
    }

    public function update(CategoryProduct $categoryProduct, array $data): CategoryProduct
    {
        $categoryProduct->update($data);
        return $categoryProduct;
    }

    public function delete(CategoryProduct $categoryProduct): bool
    {
        return $categoryProduct->delete();
    }
}
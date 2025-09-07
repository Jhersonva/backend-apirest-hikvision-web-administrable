<?php

namespace App\Services;

use App\Models\PortfolioCategory;

class PortfolioCategoryService
{
    public function getAll()
    {
        return PortfolioCategory::all();
    }

    public function create(array $data): PortfolioCategory
    {
        return PortfolioCategory::create($data);
    }

    public function update(PortfolioCategory $category, array $data): PortfolioCategory
    {
        $category->update($data);
        return $category->refresh();
    }

    public function delete(PortfolioCategory $category): bool
    {
        return $category->delete();
    }
}

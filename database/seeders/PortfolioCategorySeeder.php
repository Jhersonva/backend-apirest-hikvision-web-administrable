<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioCategory;

class PortfolioCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Instalación',
            'Reparar',
            'Alarma',
            'Inalambrico',
            'Exterior',
        ];

        foreach ($categories as $title) {
            PortfolioCategory::create([
                'title_portfolio_category' => $title,
            ]);
        }
    }
}

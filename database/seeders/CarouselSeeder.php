<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::create([
            'img_carousel' => 'carousels/default1.jpg',
            'sub_titulo' => 'Subtítulo de ejemplo 1',
            'main_title' => 'Título principal 1',
            'descripcion' => 'Esta es una descripción de ejemplo para el primer carrusel.',
        ]);
    }
}

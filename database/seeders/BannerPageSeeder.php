<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerPageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('banner_pages')->insert([
            [
                'main_title' => 'Bienvenido a Nuestra Empresa',
                'img_banner_page' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'main_title' => 'Innovación y Tecnología',
                'img_banner_page' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'main_title' => 'Tu Socio de Confianza',
                'img_banner_page' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

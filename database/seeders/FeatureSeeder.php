<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'icon_img_feature' => null,
                'name_feature' => 'Rendimiento Óptimo',
                'description' => 'Nuestro sistema garantiza la máxima velocidad y eficiencia en cada proceso.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

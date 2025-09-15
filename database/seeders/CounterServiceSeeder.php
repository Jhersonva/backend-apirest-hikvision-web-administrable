<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CounterService;

class CounterServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counters = [
            [
                //'main_img' => null, // puedes cargar imágenes luego
                'icon_img' => null,
                'counter' => '150+',
                'name_counter_services' => 'Clientes felices',
            ],
            [
                //'main_img' => null,
                'icon_img' => null,
                'counter' => '50+',
                'name_counter_services' => 'Proyectos completados',
            ],
            [
                //'main_img' => null,
                'icon_img' => null,
                'counter' => '25',
                'name_counter_services' => 'Miembros del equipo',
            ],
            [
                //'main_img' => null,
                'icon_img' => null,
                'counter' => '10',
                'name_counter_services' => 'Años de experiencia',
            ],
        ];

        foreach ($counters as $counter) {
            CounterService::create($counter);
        }
    }
}

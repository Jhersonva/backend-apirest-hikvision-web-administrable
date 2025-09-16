<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChooseUs;

class ChooseUsSeeder extends Seeder
{
    public function run(): void
    {
        ChooseUs::create([
            'main_title' => '¿Por qué elegirnos?',
            'description' => 'Ofrecemos servicios de alta calidad, con un equipo capacitado y experiencia comprobada en el mercado.',
            'icon_img_choose_us' => null,
            'list_choose_us' => [
                'Atención personalizada',
                'Soporte 24/7',
                'Garantía de satisfacción'
            ],
            'img_choose_us' => null, 
            'note' => 'Beneficios exclusivos',
            'note_list' => [
                'Descuentos especiales',
                'Promociones limitadas',
                'Planes flexibles'
            ],
        ]);
    }
}

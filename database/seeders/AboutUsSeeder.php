<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::create([
            'main_title' => 'Sobre Nosotros',
            'description' => 'Somos una empresa dedicada a brindar soluciones innovadoras en el desarrollo de software, con un equipo altamente capacitado y comprometido.',
            'list_about_us' => [
                'Mas de 10 anios de experiencia en el mercado',
                'Equipo multidisciplinario de profesionales',
                'Comprometidos con la calidad y la innovacion',
                'Atencion personalizada para cada cliente',
            ],
            'img_about' => null,
            'experience' => '10+ Años',
            'number_about_us' => '1000+',
        ]);
    }
}


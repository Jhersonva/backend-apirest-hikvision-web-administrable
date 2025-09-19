<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VideoInformationAndSolution;

class VideoInformationAndSolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Registro 1 con URL de video
        VideoInformationAndSolution::create([
            'url_video_yt' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'icon_img' => null,
            'name_information_solution' => 'Soluciones Innovadoras',
            'description' => 'Explicamos cómo nuestra empresa brinda soluciones tecnológicas innovadoras.',
        ]);

        // Registro 2 sin URL de video
        VideoInformationAndSolution::create([
            'url_video_yt' => null,
            'icon_img' => null,
            'name_information_solution' => 'Transformación Digital',
            'description' => 'Mostramos cómo apoyamos a las empresas en su transformación digital.',
        ]);
    }
}
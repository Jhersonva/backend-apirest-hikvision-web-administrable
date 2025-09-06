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
        VideoInformationAndSolution::create([
            'url_video_yt' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'icon_img' => null,
            'name_information_solution' => 'Soluciones Innovadoras',
            'description' => 'Este video explica cómo nuestra empresa brinda soluciones tecnológicas innovadoras para resolver problemas reales.',
        ]);
    }
}

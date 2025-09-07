<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformationContact;

class InformationContactSeeder extends Seeder
{
    public function run(): void
    {
        InformationContact::create([
            'img_information_contact' => null, 
            'main_title' => 'Contáctanos',
            'description' => 'Estamos disponibles para resolver tus dudas y atender tus consultas. Escríbenos y te responderemos lo más pronto posible.',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::firstOrCreate(
            ['id' => 1],
            [
                'main_title'       => 'Contáctanos',
                'main_description' => 'Estamos aquí para ayudarte. Puedes encontrarnos en nuestra oficina principal o escribirnos directamente.',
                'latitud_map'      => '-12.046374',
                'longitud_map'     => '-77.042793',
            ]
        );
    }
}
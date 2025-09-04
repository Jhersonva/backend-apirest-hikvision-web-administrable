<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInformationCompany;

class ContactInformationCompanySeeder extends Seeder
{
    public function run(): void
    {
        ContactInformationCompany::create([
            'company_logo' => null, // Se podrá subir luego
            'description_company' => 'Somos una empresa innovadora dedicada a ofrecer soluciones tecnológicas personalizadas.',
            'address' => ' José Olaya 109, Huancayo',
            'cell_phone_number' => '+51 987654321',
            'email' => 'ventas@hikvisionhuancayo.com',
            'open_time' => 'Lun - Sab (09AM - 07PM)',
        ]);
    }
}

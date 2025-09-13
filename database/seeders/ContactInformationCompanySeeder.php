<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInformationCompany;

class ContactInformationCompanySeeder extends Seeder
{
    public function run(): void
    {
        ContactInformationCompany::create([
            'company_logo' => null,
            'description_company' => 'Estamos dedicados a la importación, comercialización e instalación de sistemas de seguridad.',
            'address' => ' José Olaya 109, Huancayo',
            'cell_phone_number' => '+51 993996443',
            'email' => 'ventas@hikvisionhuancayo.com',
            'open_time' => 'Lun - Dom (08.00AM - 10.00PM)',
        ]);
    }
}

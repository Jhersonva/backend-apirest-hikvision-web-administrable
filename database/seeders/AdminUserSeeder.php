<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificamos si ya existe un admin
        if (!User::where('role', User::ROLE_ADMIN)->exists()) {
            User::create([
                'username' => 'admin',
                'email'    => 'admin@hikvision.com',
                'role'     => User::ROLE_ADMIN,
                'password' => 'admin123', 
            ]);
        }
    }
}

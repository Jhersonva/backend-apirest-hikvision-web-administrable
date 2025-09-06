<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                'username' => config('admin.username'),
                'email'    => config('admin.email'),
                'role'     => User::ROLE_ADMIN,
                'password' => config('admin.password'),
            ]);
        }
    }
}

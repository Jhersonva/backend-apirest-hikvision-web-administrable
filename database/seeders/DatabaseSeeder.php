<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ContactInformationCompanySeeder::class,
            SocialNetworksSeeder::class, 
            CarouselSeeder::class,
            FeatureSeeder::class,
            AboutUsSeeder::class,
            VideoInformationAndSolutionSeeder::class,
        ]);
    }
}

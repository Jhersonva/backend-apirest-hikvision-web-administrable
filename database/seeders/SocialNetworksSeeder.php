<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialNetwork;

class SocialNetworksSeeder extends Seeder
{
    public function run(): void
    {
        $socialNetworks = [
            [
                'name_social_networks' => 'Facebook',
                'icon_img' => null,
                'profile_url' => 'https://www.facebook.com/profile.php?id=61577989558253',
            ],
            /*
            [
                'name_social_networks' => 'Instagram',
                'icon_img' => 'https://cdn-icons-png.flaticon.com/512/2111/2111463.png',
                'profile_url' => 'https://www.instagram.com/yourprofile',
            ],
            [
                'name_social_networks' => 'LinkedIn',
                'icon_img' => 'https://cdn-icons-png.flaticon.com/512/174/174857.png',
                'profile_url' => 'https://www.linkedin.com/in/yourprofile',
            ],
            [
                'name_social_networks' => 'Twitter',
                'icon_img' => 'https://cdn-icons-png.flaticon.com/512/733/733579.png',
                'profile_url' => 'https://twitter.com/yourprofile',
            ],*/
        ];

        foreach ($socialNetworks as $network) {
            SocialNetwork::firstOrCreate(
                ['name_social_networks' => $network['name_social_networks']], 
                $network
            );
        }
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $table = 'social_networks';

    protected $fillable = [
        'name_social_networks',
        'icon_img',
        'profile_url',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'icon_img'
    ];

    // Accessor para devolver URL completa
    protected $appends = ['icon_img_url'];

    public function getIconImgUrlAttribute()
    {
        return $this->icon_img ? asset('storage/' . $this->icon_img) : null;
    }

    // Forzar el orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_social_networks' => $this->name_social_networks,
            'profile_url' => $this->profile_url,
            'icon_img_url' => $this->icon_img_url,
        ];
    }
}


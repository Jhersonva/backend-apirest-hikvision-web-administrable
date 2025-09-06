<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoInformationAndSolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_video_yt',
        'icon_img',
        'name_information_solution',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['icon_img_url'];

    public function getIconImgUrlAttribute()
    {
        return $this->icon_img ? asset('storage/' . $this->icon_img) : null;
    }

    // Forzar orden del JSON de respuesta
    public function toArray()
    {
        return [
            'id' => $this->id,
            'url_video_yt' => $this->url_video_yt,
            'icon_img' => $this->icon_img_url,
            'name_information_solution' => $this->name_information_solution,
            'description' => $this->description,
        ];
    }
}

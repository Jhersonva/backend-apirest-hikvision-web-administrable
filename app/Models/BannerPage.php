<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerPage extends Model
{
    use HasFactory;

    protected $table = 'banner_pages';

    protected $fillable = [
        'img_banner_page',
        'main_title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_banner_page',
    ];

    protected $appends = ['img_banner_page_url'];

    // Devuelve la URL pública de la imagen
    public function getImgBannerPageUrlAttribute()
    {
        return $this->img_banner_page ? asset('storage/' . $this->img_banner_page) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'img_banner_page' => $this->img_banner_page_url,
        ];
    }
}
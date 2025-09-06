<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_carousel',
        'sub_titulo',
        'main_title',
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessor para devolver URL completa
    protected $appends = ['img_carousel_url'];

    public function getImgCarouselUrlAttribute()
    {
        return $this->img_carousel ? asset('storage/' . $this->img_carousel) : null;
    }

    // Forzar el orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'img_carousel' => $this->img_carousel_url,
            'sub_titulo' => $this->sub_titulo,
            'main_title' => $this->main_title,
            'descripcion' => $this->descripcion,
        ];
    }
}

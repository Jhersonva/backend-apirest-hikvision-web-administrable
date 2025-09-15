<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterServiceMainImage extends Model
{
    use HasFactory;

    protected $fillable = ['main_img'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'main_img'
    ];

    // Accessors para devolver URL completa de la imagen
    protected $appends = ['main_img_url'];

    public function getMainImgUrlAttribute()
    {
        return $this->main_img ? asset('storage/' . $this->main_img) : null;
    }
}

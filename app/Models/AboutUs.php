<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'main_title',
        'description',
        'list_about_us',
        'img_about',
        'experience',
        'number_about_us',
    ];

    protected $casts = [
        'list_about_us' => 'array', // Se transforma automáticamente a array/JSON
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['img_about_url'];

    public function getImgAboutUrlAttribute()
    {
        return $this->img_about ? asset('storage/' . $this->img_about) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'description' => $this->description,
            'list_about_us' => $this->list_about_us,
            'img_about' => $this->img_about_url,
            'experience' => $this->experience,
            'number_about_us' => $this->number_about_us,
        ];
    }
}

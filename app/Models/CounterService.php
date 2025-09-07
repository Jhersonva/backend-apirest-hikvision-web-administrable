<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterService extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_img',
        'icon_img',
        'counter',
        'name_counter_services',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessors para devolver URL completa de las imágenes
    protected $appends = ['main_img_url', 'icon_img_url'];

    public function getMainImgUrlAttribute()
    {
        return $this->main_img ? asset('storage/' . $this->main_img) : null;
    }

    public function getIconImgUrlAttribute()
    {
        return $this->icon_img ? asset('storage/' . $this->icon_img) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_img' => $this->main_img_url,
            'icon_img' => $this->icon_img_url,
            'counter' => $this->counter,
            'name_counter_services' => $this->name_counter_services,
        ];
    }
}

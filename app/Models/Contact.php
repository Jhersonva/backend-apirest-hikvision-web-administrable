<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'main_description',
        'latitud_map',
        'longitud_map',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'main_description' => $this->main_description,
            'latitud_map' => $this->latitud_map,
            'longitud_map' => $this->longitud_map,
        ];
    }
}
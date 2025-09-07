<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationContact extends Model
{
    use HasFactory;

    protected $table = 'information_contact';

    protected $fillable = [
        'img_information_contact',
        'main_title',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['img_information_contact_url'];

    public function getImgInformationContactUrlAttribute()
    {
        return $this->img_information_contact ? asset('storage/' . $this->img_information_contact) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'description' => $this->description,
            'img_information_contact' => $this->img_information_contact_url,
        ];
    }
}

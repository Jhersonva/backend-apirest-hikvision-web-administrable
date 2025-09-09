<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseUs extends Model
{
    use HasFactory;

    protected $table = 'choose_us';

    protected $fillable = [
        'main_title',
        'description',
        'icon_img_choose_us',
        'list_choose_us',
        'img_choose_us',
        'note',
        'note_list',
    ];

    protected $casts = [
        'list_choose_us' => 'array',
        'note_list' => 'array',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'icon_img_choose_us_url',
        'img_choose_us_url',
    ];

    // Accessor → devolver URL completa de la imagen de ícono
    public function getIconImgChooseUsUrlAttribute()
    {
        return $this->icon_img_choose_us ? asset('storage/' . $this->icon_img_choose_us) : null;
    }

    // Accessor → devolver URL completa de la imagen principal
    public function getImgChooseUsUrlAttribute()
    {
        return $this->img_choose_us ? asset('storage/' . $this->img_choose_us) : null;
    }

    // Forzar orden en el JSON de salida
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'description' => $this->description,
            'icon_img_choose_us' => $this->icon_img_choose_us_url,
            'list_choose_us' => $this->list_choose_us,
            'img_choose_us' => $this->img_choose_us_url,
            'note' => $this->note,
            'note_list' => $this->note_list,
        ];
    }
}

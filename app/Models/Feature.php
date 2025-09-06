<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_img_feature',
        'name_feature',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['icon_img_feature_url'];

    public function getIconImgFeatureUrlAttribute()
    {
        return $this->icon_img_feature ? asset('storage/' . $this->icon_img_feature) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'icon_img_feature' => $this->icon_img_feature_url,
            'name_feature' => $this->name_feature,
            'description' => $this->description,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_service_category',
        'titulo_service_category',
        'description_service_category',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['icon_service_category_url'];

    public function getIconServiceCategoryUrlAttribute()
    {
        return $this->icon_service_category
            ? asset('storage/' . $this->icon_service_category)
            : null;
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'service_category_id');
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'icon_service_category' => $this->icon_service_category_url,
            'titulo_service_category' => $this->titulo_service_category,
            'description_service_category' => $this->description_service_category,
        ];
    }
}

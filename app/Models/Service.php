<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category_id',
        'icon_service',
        'name_services',
        'description_services',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['icon_service_url'];

    public function getIconServiceUrlAttribute()
    {
        return $this->icon_service ? asset('storage/' . $this->icon_service) : null;
    }

    /**
     * Relación: un Service pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    // Forzar orden del JSON e incluir categoría
    public function toArray()
    {
        return [
            'id' => $this->id,
            'service_category_id' => $this->service_category_id,
            'category' => $this->category ? [
                'id' => $this->category->id,
                'titulo_service_category' => $this->category->titulo_service_category,
            ] : null,
            'icon_service' => $this->icon_service_url,
            'name_services' => $this->name_services,
            'description_services' => $this->description_services,
        ];
    }
}

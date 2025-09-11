<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInstallation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description_product_installation',
        'img_product_installation',
        'what_includes',
    ];

    protected $casts = [
        'what_includes' => 'array',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_product_installation',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['img_product_installation_url'];

    public function getImgProductInstallationUrlAttribute()
    {
        return $this->img_product_installation ? asset('storage/' . $this->img_product_installation) : null;
    }

    // Relación con Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'product' => $this->product ? $this->product->name_product : null,
            'description_product_installation' => $this->description_product_installation,
            'img_product_installation_url' => $this->img_product_installation_url,
            'what_includes' => $this->what_includes,
        ];
    }
}
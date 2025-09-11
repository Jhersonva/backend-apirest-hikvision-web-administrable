<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description_product_detail',
        'img_product_detail',
        'what_includes',
    ];

    protected $casts = [
        'what_includes' => 'array',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_product_detail',
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['img_product_detail_url'];

    public function getImgProductDetailUrlAttribute()
    {
        return $this->img_product_detail ? asset('storage/' . $this->img_product_detail) : null;
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
            'product_name' => $this->product ? $this->product->name_product : null,
            'description_product_detail' => $this->description_product_detail,
            'img_product_detail_url' => $this->img_product_detail_url,
            'what_includes' => $this->what_includes,
        ];
    }
}
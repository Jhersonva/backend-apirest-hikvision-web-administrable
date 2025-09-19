<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_product_id',
        'product_id',
        'img_store_discount',
        'range_price_start',
        'range_price_end',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_store_discount',
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['img_store_discount_url'];

    public function getImgStoreDiscountUrlAttribute()
    {
        return $this->img_store_discount ? asset('storage/' . $this->img_store_discount) : null;
    }

    // Relación con CategoryProduct
    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    // Relación con Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'category_product' => $this->categoryProduct ? $this->categoryProduct->name_category_products : null,
            'product' => $this->product ? $this->product->name_product : null,
            'img_store_discount' => $this->img_store_discount_url,
            'range_price_start' => $this->range_price_start,
            'range_price_end' => $this->range_price_end,
        ];
    }
}
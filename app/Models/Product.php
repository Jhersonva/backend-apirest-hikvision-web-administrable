<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_product_id',
        'img_product',
        'name_product',
        'state_offer',
        'not_offer_price',
        'offer_price',
        'star_quality',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_product',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['img_product_url'];

    public function getImgProductUrlAttribute()
    {
        return $this->img_product ? asset('storage/' . $this->img_product) : null;
    }

    // Relación con CategoryProduct
    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    // Relación con ProductDetail
    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    // Relación con ProductInstallation
    public function productInstallation()
    {
        return $this->hasOne(ProductInstallation::class);
    }

    // Forzar orden del JSON incluyendo ProductDetail
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_product' => $this->name_product,
            'img_product' => $this->img_product_url,
            'state_offer' => $this->state_offer,
            'not_offer_price' => $this->not_offer_price,
            'offer_price' => $this->offer_price,
            'star_quality' => $this->star_quality,
            'category_product' => $this->categoryProduct ? $this->categoryProduct->name_category_products : null,
            'product_detail' => $this->productDetail ? $this->productDetail->toArray() : null,
            'product_installation' => $this->productInstallation ? $this->productInstallation->toArray() : null,
        ];
    }
}
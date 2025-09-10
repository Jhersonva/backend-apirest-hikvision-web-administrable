<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'category_products';

    protected $fillable = [
        'name_category_products',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_category_products' => $this->name_category_products,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'image_category_id',
        'title',
        'file_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'file_path',
    ];

    // Accessor → devuelve URL completa
    protected $appends = ['file_url'];

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    // Relación con categoría
    public function category()
    {
        return $this->belongsTo(ImageCategory::class, 'image_category_id');
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'category' => $this->category ? $this->category->name : null,
            'title' => $this->title,
            'file_url' => $this->file_url,
        ];
    }
}
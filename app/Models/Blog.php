<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'img_blog',
        'name_blog',
        'user_blog',
        'date_blog',
        'description_blog',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_blog',
    ];

    protected $appends = ['img_blog_url'];

    // Devuelve la URL pública de la imagen
    public function getImgBlogUrlAttribute()
    {
        return $this->img_blog ? asset('storage/' . $this->img_blog) : null;
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_blog' => $this->name_blog,
            'user_blog' => $this->user_blog,
            'date_blog' => $this->date_blog,
            'description_blog' => $this->description_blog,
            'img_blog_url' => $this->img_blog_url,
        ];
    }
}

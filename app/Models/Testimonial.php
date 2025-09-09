<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [
        'img_testimonial',
        'name_testimonials',
        'type_testimonials',
        'coment_testimonials',
        'qualification',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Agregar URL completa de la imagen
    protected $appends = ['img_testimonial_url'];

    public function getImgTestimonialUrlAttribute()
    {
        return $this->img_testimonial ? asset('storage/' . $this->img_testimonial) : null;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'img_testimonial' => $this->img_testimonial_url,
            'name_testimonials' => $this->name_testimonials,
            'type_testimonials' => $this->type_testimonials,
            'coment_testimonials' => $this->coment_testimonials,
            'qualification' => $this->qualification,
        ];
    }
}

<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_testimonial' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_testimonials' => 'required|string|max:250',
            'type_testimonials' => 'required|string|max:150',
            'coment_testimonials' => 'required|string',
            'qualification' => 'required|integer|min:0|max:5',
        ];
    }
}

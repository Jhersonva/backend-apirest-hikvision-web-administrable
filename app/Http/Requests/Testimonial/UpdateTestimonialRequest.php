<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_testimonial' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_testimonials' => 'sometimes|required|string|max:250',
            'type_testimonials' => 'nullable|string|max:150',
            'coment_testimonials' => 'sometimes|required|string',
            'qualification' => 'sometimes|required|integer|min:0|max:5',
        ];
    }
}

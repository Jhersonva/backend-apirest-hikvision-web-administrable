<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_blog' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_blog' => 'sometimes|string|max:150',
            'user_blog' => 'sometimes|string|max:150',
            'date_blog' => 'sometimes|date',
            'description_blog' => 'sometimes|string',
        ];
    }
}
<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_blog' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_blog' => 'required|string|max:150',
            'user_blog' => 'required|string|max:150',
            'date_blog' => 'required|date',
            'description_blog' => 'required|string',
        ];
    }
}
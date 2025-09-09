<?php
namespace App\Http\Requests\SpecialtyCategory;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'specialty_name' => 'required|string|max:250',
        ];
    }
}

<?php
namespace App\Http\Requests\SectionTitle;

use Illuminate\Foundation\Http\FormRequest;

class SectionTitleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'section_name' => 'sometimes|string|max:100|unique:section_titles,section_name,' . $this->id,
            'description' => 'nullable|string'
        ];
    }
}

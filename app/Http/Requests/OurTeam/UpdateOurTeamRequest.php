<?php

namespace App\Http\Requests\OurTeam;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_specialty_category' => 'sometimes|exists:specialty_categories,id',
            'name_employee' => 'sometimes|string|max:250',
            'img_our_team' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'contact_value_whatsapp' => 'sometimes|string|size:9',
            'contact_value_celular' => 'sometimes|string|size:9',
        ];
    }
}

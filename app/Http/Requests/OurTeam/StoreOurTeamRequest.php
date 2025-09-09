<?php

namespace App\Http\Requests\OurTeam;

use Illuminate\Foundation\Http\FormRequest;

class StoreOurTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // luego puedes restringir con políticas si solo admin
    }

    public function rules(): array
    {
        return [
            'id_specialty_category' => 'required|exists:specialty_categories,id',
            'name_employee' => 'required|string|max:250',
            'img_our_team' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'contact_value_whatsapp' => 'required|string|size:9',
            'contact_value_celular' => 'required|string|size:9',
        ];
    }
}

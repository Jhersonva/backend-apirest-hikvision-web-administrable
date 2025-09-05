<?php

namespace App\Http\Requests\SocialNetWork;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSocialNetworkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_social_networks' => [
                'sometimes',
                'string',
                'max:15',
                Rule::unique('social_networks', 'name_social_networks')->ignore($this->route('id'), 'id'),
            ],
            'icon_img' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'profile_url' => 'nullable|url|max:255',
        ];
    }
}
<?php

namespace App\Http\Requests\SocialNetWork;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialNetworkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_social_networks' => 'required|string|max:15|unique:social_networks,name_social_networks',
            'icon_img' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'icon_url' => 'nullable|url|max:500', // <- Agregado
            'profile_url' => 'nullable|url|max:255',
        ];
    }
}
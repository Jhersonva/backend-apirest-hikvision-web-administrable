<?php

namespace App\Http\Requests\VideoInformationAndSolution;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoInformationAndSolutionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url_video_yt' => 'nullable|url|max:255',
            'icon_img' => 'nullable|image|max:2048',
            'name_information_solution' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ];
    }
}

<?php  

namespace App\Http\Requests\CounterService;

use Illuminate\Foundation\Http\FormRequest;

class CounterServiceMainImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'main_img' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ];
    }
}

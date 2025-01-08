<?php

namespace App\Http\Requests\HeroSlider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo_title' => 'nullable|string|max:25',
            'photo_slide' => 'nullable|image|mimes:png,jpg,jpeg,gif,sug|max:2048'
        ];
    }
}

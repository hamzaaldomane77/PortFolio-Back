<?php

namespace App\Http\Requests\HeroSlider;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeroSliderRequest extends FormRequest
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
            'photo_title' => 'required|string|max:25',
            'photo_slide' => 'required|image|mimes:png,jpg,jpeg,gif,sug|max:2048'
        ];
    }
}

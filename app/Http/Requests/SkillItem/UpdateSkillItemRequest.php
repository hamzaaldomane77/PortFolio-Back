<?php

namespace App\Http\Requests\SkillItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillItemRequest extends FormRequest
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
            'item'    => 'nullable|string|max:50',
            'image'   => 'nullable|image|mimes:png,jpg,jpeg,gif,sug|max:2048',
        ];
    }
}

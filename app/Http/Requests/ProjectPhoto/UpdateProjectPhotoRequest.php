<?php

namespace App\Http\Requests\ProjectPhoto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectPhotoRequest extends FormRequest
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
            'project_id' => 'nullable|integer|exists:projects,id',
            'photo'      => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,svg',
        ];
    }
}

<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingRequest extends FormRequest
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
            'training_name'             => 'nullable|string|max:50',
            'company_name'              => 'nullable|string|max:24',
            'description'               => 'nullable|string',
            'company_logo'              => 'nullable|image',
            'company_link'              => 'nullable|string|url',
            'certificate_link'          => 'nullable|string|url',
            'recomendation_letter_link' => 'nullable|string|url',
              ];
    }
}

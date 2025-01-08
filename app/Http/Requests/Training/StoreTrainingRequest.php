<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
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
            'training_name'             => 'required|string|max:50',
            'company_name'              => 'required|string|max:24',
            'description'               => 'required|string',
            'company_logo'              => 'required|image',
            'company_link'              => 'required|string|url',
            'certificate_link'          => 'required|string|url',
            'recomendation_letter_link' => 'required|string|url',
        ];
    }
}

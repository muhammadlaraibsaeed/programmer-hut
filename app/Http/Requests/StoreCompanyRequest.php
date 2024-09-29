<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255', 
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website_link' => 'nullable|url|max:255', 
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The company name is required.',
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
            'email.email' => 'The email must be a valid email address.',
            'website_link.url' => 'The website link must be a valid URL.',
        ];
    }

}

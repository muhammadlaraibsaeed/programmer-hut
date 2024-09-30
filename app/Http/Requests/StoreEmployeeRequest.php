<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name'       => 'nullable|string|max:255',
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email', // Adjust the table and field name if necessary
            'phone'      => 'nullable|string|max:15',
            'company_id' => 'required|integer|exists:companies,id',
        ];
    }
}

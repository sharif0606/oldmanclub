<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'fname_en'=>'required|max:255',
            'ContactNumber_en'=>'required|unique:clients,contact_en',
            'EmailAddress'=>'required|unique:clients,email',
            'password'=>'required|confirmed'
        ];
    }
}

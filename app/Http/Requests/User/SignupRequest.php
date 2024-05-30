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
            'fname'=>'required|max:255',
            'contact_no'=>'required|unique:clients,contact_no',
            'email'=>'required|unique:clients,email',
            'password'=>'required|confirmed'
        ];
    }
}

// 'password'=>['required','confirmed',Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
// use Illuminate\Validation\Rules\Password;

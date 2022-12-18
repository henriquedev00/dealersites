<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|min:10|max:255|exists:users,email',
            'password' => 'required|string|min:8|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email.',
            'email.min' => 'Email must be at least 10 characters long.',
            'email.max' => 'Email can be a maximum of 255 characters.',
            'email.exists' => 'No account registered with this email.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 10 characters long.',
            'password.max' => 'Password can be a maximum of 255 characters.'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:10|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed'
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
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 3 characters long.',
            'name.max' => 'The name can be a maximum of 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email.',
            'email.min' => 'The email must be at least 10 characters long.',
            'email.max' => 'The email can be a maximum of 255 characters.',
            'email.unique' => 'This email is already being used.',

            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 10 characters long.',
            'password.max' => 'The password can be a maximum of 255 characters.',
            'password.confirmed' => 'Passwords do not match.'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'email.min' => 'O email precisa ter no mínimo 10 caracteres',
            'email.max' => 'O email pode ter no máximo 255 caracteres',
            'email.exists' => 'Nenhuma conta cadastrada com esse email',

            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha precisa ter no mínimo 10 caracteres',
            'password.max' => 'A senha pode ter no máximo 255 caracteres'
        ];
    }
}

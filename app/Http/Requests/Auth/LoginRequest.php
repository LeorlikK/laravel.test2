<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages():array
    {
        return [
            'email.required' => 'Введите email!',
            'email.email' => 'Некорректный email!',
            'exists' => 'Такого пользователя не существует!',
            'password.required' => 'Введите пароль!',
            'password.string' => 'Некорректный пароль!',
        ];
    }
}

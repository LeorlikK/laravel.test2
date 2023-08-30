<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
            'login' => ['required', 'string', 'max:20', 'min:3', Rule::unique('users', 'login')],
            'email' => ['required', 'email', 'max:200', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:200', 'regex:/^(?=.*[A-ZА-Я])(?=.*\d).+$/', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'max:200'],
            'avatar' => ['nullable', 'mimes:png,jpeg,jpg,gif', 'max:10240',
                Rule::dimensions()->minWidth(100)->minHeight(100)->maxWidth(5000)->maxHeight(5000)]
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'Поле login обязательно для заполнения!',
            'login.string' => 'Поле login должно быть строкой!',
            'login.min' => 'Поле login должно быть больше 3 символов!',
            'login.max' => 'Поле login не должно превышать 20 символов!',
            'login.unique' => 'Такой пользователь уже существует!',
            'email.required' => 'Поле email обязательно для заполнения!',
            'email.email' => 'Некорректный email!',
            'email.max' => 'Поле email не должно превышать 200 символов!',
            'email.unique' => 'Этот email уже зарегистрирован!',
            'password.required' => 'Поле password обязательно для заполнения!',
            'password.string' => 'Некорректный пароль!',
            'password.min' => 'Поле password должно быть больше 8 символов!',
            'password.max' => 'Поле password не должно превышать 200 символов!',
            'password.regex' => 'Пароль должен содержать заглавные буквы и цифры!',
            'password.confirmed' => 'Пароли не совпадают!',
            'password_confirmation.required' => 'Поле password confirmation обязательно для заполнения!',
            'password_confirmation.max' => 'Поле Password Confirmation не должно превышать 200 символов!',
            'avatar.mimes' => 'Файл должен быть изображением!',
            'avatar.max' => 'Максимальный размер файла 10МБ!',
            'avatar.dimensions' => 'Некорректный размер изображения: мин 100х100; макс: 5000х5000',
        ];
    }
}

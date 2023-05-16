<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLoginForm extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Валидационные правила
     */
    public function rules(): array
    {
        return [
            'login' => 'required|min:3|max:64',
            'password' => 'required|min:4'
        ];
    }

    /**
     * Сообщения для ошибок
     */
    public function messages(): array
    {
        return [
            'login.required' => 'Логин обязателен к заполнению',
            'login.min' => 'Минимальная длина логина 3 символа',
            'login.max' => 'Превышено количество символов логина',
            'password.required' => 'Пароль обязателен к заполнению',
            'password.min' => 'Минимальная длина пароля 4 символов'
        ];
    }
}

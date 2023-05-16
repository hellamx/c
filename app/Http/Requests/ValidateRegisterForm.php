<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRegisterForm extends FormRequest
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
            'login' => 'required|min:3|max:64|unique:users',
            'fullname' => 'required|min:3|max:64',
            'phone' => 'required',
            'email' => 'email:rfc,dns',
            'role' => 'integer',
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
            'login.unique' => 'Логин уже существует',
            'login.min' => 'Минимальная длина логина 3 символа',
            'login.max' => 'Превышено количество символов логина',
            'fullname.required' => 'ФИО обязательно для заполнения',
            'fullname.min' => 'ФИО должно быть не менее 3 символов',
            'fullname.max' => 'Превышено количество символов ФИО',
            'phone.required' => 'Номер телефона обязателен для заполнения',
            'email.email' => 'Некорректно введен Email',
            'role.integer' => 'Неккоректно указана роль',
            'password.required' => 'Пароль обязателен к заполнению',
            'password.min' => 'Минимальная длина пароля 4 символов'
        ];
    }
}

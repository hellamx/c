<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePageForm extends FormRequest
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
            'text' => 'required|min:3|max:64',
            'url' => 'required|min:4|unique:pages'
        ];
    }

    /**
     * Сообщения для ошибок
     */
    public function messages(): array
    {
        return [
            'text.required' => 'Текст ссылки обязателен к заполнению',
            'text.min' => 'Минимальная длина текста ссылки 3 символа',
            'text.max' => 'Превышено количество символов текста ссылки',
            'url.required' => 'URL обязателен к заполнению',
            'url.unique' => 'URL уже существует',
            'url.min' => 'Минимальная длина URL 4 символа'
        ];
    }
}

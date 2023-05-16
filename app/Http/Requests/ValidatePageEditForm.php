<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePageEditForm extends FormRequest
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
            'title' => 'required|min:3|max:64',
            'url' => 'required|min:4',
            'status' => 'required|integer|max:2'
        ];
    }

    /**
     * Сообщения для ошибок
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Текст ссылки обязателен к заполнению',
            'title.min' => 'Минимальная длина текста ссылки 3 символа',
            'title.max' => 'Превышено количество символов текста ссылки',
            'url.required' => 'URL обязателен к заполнению',
            'url.unique' => 'URL уже существует',
            'url.min' => 'Минимальная длина URL 4 символа'
        ];
    }
}

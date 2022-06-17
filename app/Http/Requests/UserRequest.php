<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:1'
            ],
            'phone_number' => [
                'required',
                'numeric',
                'min:1'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле не заполнено!',
            'numeric' => 'Разрешен ввод только цифр!'
        ];
    }
}

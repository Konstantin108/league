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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required'
            ],
            'avatar_path' => [
                'required'
            ],
            'phone_number' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A title is required',
            'avatar_path.required' => 'A message is required',
            'phone_number.required' => 'A message is required',
        ];
    }

    public function errors()
    {
        return [
            'name' => 'A title is required',
            'avatar_path' => 'A message is required',
            'phone_number' => 'A message is required',
        ];
    }

    public function name()
    {
        return [
            'name' => 'A title is required',
            'avatar_path' => 'A message is required',
            'phone_number' => 'A message is required',
        ];
    }
}

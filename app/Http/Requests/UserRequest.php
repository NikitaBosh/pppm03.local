<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
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
            'name' => 'required|max:255',
            'email' => 'required|max:20',
            'password' => 'required|max:12',
        ];

    }
        public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести ФИО',
            'email.required' => 'Необходимо ввести E-mail',
            'password.required' => 'Необходимо ввести Пароль',
        ];
    }
}

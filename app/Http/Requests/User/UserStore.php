<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:20',
            'password' => 'required|max:16',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести ФИО',
            'name.max' => 'Имя пользователя не должно превышать :max символов',
            'email.required' => 'Необходимо ввести E-mail',
            'email.max' => 'Название электронной почты не должно превышать :max символов',
            'password.required' => 'Необходимо ввести Пароль',
            'password.max' => 'Количество символов в пароле не должно превышать :max',
        ];
    }
}

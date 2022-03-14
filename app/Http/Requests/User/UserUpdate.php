<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends UserStore
{
    public function rules() 
    {
        return array_merge(parent::rules(), 
            ['password' => [
                'nullable',
                'max:16'
            ]]);
    }
}

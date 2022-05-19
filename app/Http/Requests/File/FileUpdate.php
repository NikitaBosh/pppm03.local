<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class FileUpdate extends FileStore
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), 
            [
                'file' => [
                    'nullable', 
                    'max:153600'
            ]]);
    }
}

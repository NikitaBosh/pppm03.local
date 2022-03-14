<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'files' => 'required|max:153600',
        ];
    }
    
    public function messages()
    {
        return [
            'files.required' => 'Поле файл является обязательным для заполнения.',
            'files.file' => 'Вы не загрузили файл.',
            'files.size' => 'Размер файла слишком велик.',
        ];
    }

}

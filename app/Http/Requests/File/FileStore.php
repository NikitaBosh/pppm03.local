<?php

namespace App\Http\Requests\File;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FileStore extends FormRequest
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
            'file' => 'required|max:153600',
            'type' => 'required|between:1,255',
            'author' => 'required|between:1,255',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Поле файл является обязательным для заполнения.',
            'file.max' => 'Размер файла слишком велик.',
            'type.required' => 'Необходимо ввести тип файла.',
            'type.between' => 'Количество символов должно быть в диапозоне от :min до :max.',
            'author.required' => 'Необходио ввести название автора',
            'author.between' => 'Количество символов должно быть в диапозоне от :min до :max.',
            'category_id.required' => 'Необходимо ввести категорию',
        ];
    }
}

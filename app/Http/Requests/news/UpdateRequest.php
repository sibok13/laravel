<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'author' => ['required', 'string', 'min:5', 'max:200'],
            'description' => ['required', 'string', 'min:10'],
            'status' => ['required', 'string', 'min:4', 'max:12']
        ];
    }
}

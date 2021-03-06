<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsContentRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:1024',
            'img_src' => 'mimes:jpg,png,jpeg|max:5048',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'News title',
            'description' => 'News description'
        ];
    }
}

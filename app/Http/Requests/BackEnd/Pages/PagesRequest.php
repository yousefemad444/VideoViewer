<?php

namespace App\Http\Requests\BackEnd\Pages;

use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'desc' => ['required','min:10'],
            'meta_keywords' => ['max:255'],
            'meta_desc' => ['max:255'],
        ];
    }
}

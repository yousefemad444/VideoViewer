<?php

namespace App\Http\Requests\FrontEnd\Messages;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
            'name' => ['required', 'min:3' ,'max:255'],
            'email' => ['required', 'min:6' ,'max:255','email'],
            'message' => ['required', 'min:6' ],
        ];
    }
}

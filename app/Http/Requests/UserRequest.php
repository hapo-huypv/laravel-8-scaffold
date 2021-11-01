<?php

namespace App\Http\Requests;

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
            'phone' => ['digits_between:10,11'],
            'image' => ['image'],
            'profile_name' => ['not_regex:/[0-9]|~|\.|\,|\!|\@|\#|\$/i'],
            'about_me' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}

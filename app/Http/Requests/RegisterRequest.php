<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required_with:password', 'same:password', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'this username must be string',
            'name.max' => 'this username must be shorter than 30 characters',
            'password.min' => 'this password must be more than 8 characters',
            'email.email' => 'this email must be form abc@xyz.com',
            'email.max' => 'this email must be shorter than 255 characters',
            'email.unique:users' => 'this email has already been token',
            'password_confirmation.same:password' => 'this repeat password is not as same as password',
        ];
    }
}

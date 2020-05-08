<?php

namespace Nikservik\LaravelJwtAuth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name.required',
            'name.string' => 'name.string',
            'name.min' => 'name.min',
            'email.required' => 'email.required',
            'email.email' => 'email.email',
            'email.unique' => 'email.unique',
            'password.required' => 'password.required',
            'password.min' => 'password.min',
            'password.confirmed' => 'password.confirmed',
        ];
    }

}

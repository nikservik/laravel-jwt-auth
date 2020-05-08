<?php

namespace Nikservik\LaravelJwtAuth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthNewPasswordRequest extends FormRequest
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
            'email' => 'required',
            'token' => 'required',
            'password'  => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'errors.email',
            'token.required' => 'errors.email',
            'password.required' => 'password.required',
            'password.min' => 'password.min',
            'password.confirmed' => 'password.confirmed',
        ];
    }
}

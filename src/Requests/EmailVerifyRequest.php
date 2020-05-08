<?php

namespace Nikservik\LaravelJwtAuth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailVerifyRequest extends FormRequest
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
            'user' => 'required|exists:users,id',
            'hash' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'user.required',
            'user.exists' => 'user.exists',
            'hash.required' => 'hash.required',
        ];
    }
}

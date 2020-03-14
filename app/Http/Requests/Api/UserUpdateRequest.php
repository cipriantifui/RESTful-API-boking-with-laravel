<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    /**
    * Custom message for validation
    *
    * @return array
    */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!'
        ];
    }

}

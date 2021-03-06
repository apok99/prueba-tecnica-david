<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
{   
    protected $redirect = '/api/validator/errors';

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
            'user.name' => 'required',
            'user.email' => 'required|unique:App\Models\User,email|email',
        ];
    }

    public function messages()
    {
        return [
            'user.name.required' => 'A name is required.',
            'user.email.required' => 'A email is required.',
            'user.email.unique' => 'The email is already taken.',
            'user.email.email' => 'Please enter a valid email address.'    
        ];
    }
}

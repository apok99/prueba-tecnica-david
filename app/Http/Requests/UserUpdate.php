<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'user.id' => 'required|exists:App\Models\User,id',
            'user.email' => 'unique:App\Models\User,email|email',
        ];
    }

    public function messages()
    {
        return [
            'user.id.required' => 'An user is required.',
            'user.id.exists' => 'The user does not exist.',
            'user.email.unique' => 'The email is already on use.',
            'user.email.email' => 'Please enter a valid email address.'    
        ];
    }
}

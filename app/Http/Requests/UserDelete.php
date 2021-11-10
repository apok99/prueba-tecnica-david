<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDelete extends FormRequest
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
        ];

    }

    public function messages()
    {
        return [
            'user.id.required' => 'An user is required.',
            'user.id.exists' => 'The user does not exist.',
        ];
    }
}

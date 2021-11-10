<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkEntryCreate extends FormRequest
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
            'workEntry.user.id' => 'required|exists:App\Models\User,id',
            'workEntry.startDate' => 'required|date',
            'workEntry.endDate' => 'required|date|after:startDate'
        ];
    }

    public function messages()
    {
        return [
            'workEntry.user.id' => 'An user is required.',
            'workEntry.id.exists' => 'The user does not exist.',
            'workEntry.startDate.date' => 'Please, use datetime format.',
            'workEntry.endDate.date' => 'Please, use datetime format.',
            'workEntry.endDate.after' => 'End Date has to be bigger than start date.'        
        ];
    }
    
}

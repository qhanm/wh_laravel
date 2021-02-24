<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'email' => 'required|email|unique:information,email|max:50',
            'username' => 'required|max:50|min:6|unique:client,username',
            'password' => 'required|max:50|min:6',
            'first_name' => 'string|max:30',
            'last_name' => 'string|max:30',
            'middle_name' => 'string|nullable',
            'address' => 'string|max:150',
            'postal_code' => 'string|nullable',
            'city' => 'string:max:50',
            'country' => 'string|max:50',
            'phone' => 'string|max:15',
            'fax' => 'string|nullable',
        ];
    }
}

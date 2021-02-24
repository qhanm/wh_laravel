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
            'password' => 'required',
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'string',
            'address' => 'string',
            'postal_code' => 'string',
            'city' => 'string',
            'country' => 'string',
            'phone' => 'string',
            'fax' => 'string',
        ];
    }
}

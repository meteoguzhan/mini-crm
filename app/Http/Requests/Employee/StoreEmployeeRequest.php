<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'company_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email|unique:employees'
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
            'company_id.required' => 'You must choose a company!',
            'first_name.required' => 'First name is required!',
            'last_name.required' => 'Last name is required!',
            'email.email' => 'Email format not appropriate!'
        ];
    }
}

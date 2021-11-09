<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable|email|unique:companies',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
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
            'name.required' => 'Name is required!',
            'email.email' => 'Email format not appropriate!',
            'logo.dimensions' => 'Its dimensions must be 100x100!',
            'website.url' => 'Website format not appropriate!'
        ];
    }
}

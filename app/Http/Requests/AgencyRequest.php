<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'tel' => 'nullable|string|max:30',
            'principal' => 'nullable|string|max:100',
            'address_zipcode' => 'nullable|string|max:6',
            'address_county' => 'nullable|string|max:10',
            'address_district' => 'nullable|string|max:10',
            'address_others' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
        ];
    }
}

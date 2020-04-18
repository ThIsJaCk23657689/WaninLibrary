<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonerRequest extends FormRequest
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
            'birthday' => 'nullable|date',
            'email' => 'nullable|email',
            'tel' => 'nullable|string|max:30',
            'cellphone' => 'nullable|string|max:30',
            'address_zipcode' => 'nullable|string|max:5',
            'address_county' => 'nullable|string|max:10',
            'address_district' => 'nullable|string|max:10',
            'address_others' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
            'exposure' => 'required|integer',
        ];
    }
}

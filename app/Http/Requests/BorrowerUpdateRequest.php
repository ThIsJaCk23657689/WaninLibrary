<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowerUpdateRequest extends FormRequest
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
            'agency_id' => "nullable",
            'name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'tel' => 'required|string|max:30',
            'job_title' => 'nullable|string|max:100',
            'status' => 'required|integer',
            'activated' => 'nullable|bool',
            'address_zipcode' => 'nullable|string|max:6',
            'address_county' => 'nullable|string|max:10',
            'address_district' => 'nullable|string|max:10',
            'address_others' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
            'count' => 'nullable|integer',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'require|string|max:100',
            'account' => 'require|string|max:20|min:6',
            'password' => 'require|string|max:20|min:6|confirmed',
            'status' => 'require|integer|max:1',
            'tel' => 'nullable|string|max:30',
            'email' => 'require|string|max:255',
            'address_zipcode' => 'nullable|string|max:5',
            'address_county' => 'nullable|string|max:10',
            'address_district' => 'nullable|string|max:10',
            'address_others' => 'nullable|string|max:255',
            'check_code' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
        ];
    }
}

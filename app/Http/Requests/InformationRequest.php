<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'email' => 'required|email',
            'tel' => 'required|string|max:30',
            'fax' => 'required|string|max:30',
            'address' => 'required|string|max:50',
            'open_at' => 'required|time',
            'close_at' => 'required|time',
        ];
    }
}

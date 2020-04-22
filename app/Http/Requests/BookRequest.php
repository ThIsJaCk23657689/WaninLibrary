<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'donor_id' => "nullable",

            // 'barcode' => 'required|integer|unique',
            'callnum' => 'required|string|min:3',
            'category' => 'required|string',
            'status' => 'required|integer',

            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:100',
            'translator' => 'nullable|string|max:100',
            'publisher' => 'nullable|string|max:100',
            'edition' => 'nullable|string|max:20',
            'cover_image' => 'nullable|string|max:255',
            'ISBN' => 'nullable|string|max:50',
            'published_date' => 'nullable|date',
            'price' => 'nullable|numeric',
            'language' => 'nullable|string',

            'content' => 'nullable|string|max:255',
            'count' => 'required|integer',
        ];
    }
}

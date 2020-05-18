<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationRequest extends FormRequest
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
            'recommendation_title' => 'required|string|max:100',
            'book_id_1' => 'required|integer',
            'book_id_2' => 'required|integer',
            'book_id_3' => 'required|integer',
            'book_id_4' => 'required|integer',
            'book_id_5' => 'required|integer',
            'book_id_6' => 'required|integer',
            'book_id_7' => 'required|integer',
            'book_id_8' => 'required|integer',
            'book_id_9' => 'required|integer',
            'book_id_10' => 'required|integer',
        ];
    }
}

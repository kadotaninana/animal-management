<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorySaveRequest extends FormRequest
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
            'medicine_histories' => 'array|nullable',
            'medicine_histories.*.medicine_name' => 'string|required',
            'medicine_histories.*.medicine_quantity' => 'integer|required',
            'medicin_histories.*.memo' => 'string|required',
            'medicin_histories.*.unit' => 'string|required',
            'medicin_histories.*.when' => 'string|required',
            'medicin_histories.*.how_often' => 'integer|required',
            'medicin_histories.*.start_at' => 'date|required',
        ];
    }
}

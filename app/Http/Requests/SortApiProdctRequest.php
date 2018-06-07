<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortApiProdctRequest extends FormRequest
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
            'sort' => 'in:new',
            'sort_type' => 'in:DESC,ASC',
            'limit' => 'integer',
            'category' => 'integer|exists:categories,id',
        ];
    }
}

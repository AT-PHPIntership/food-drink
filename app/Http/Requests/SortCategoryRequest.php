<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortCategoryRequest extends FormRequest
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
            'sortBy' => 'in:'.implode(',', ['id', 'name']),
            'dir' => 'in:'.implode(',', ['DESC', 'ASC'])
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $category = $this->route()->parameter('category');
        $ruleParentId = '';
        if ($this->parent_id !== null) {
            $ruleParentId .= 'required|integer|exists:categories,id';
        }
        return [
            'name'=>'required|unique:categories,name,' . $category->name . ',name|max:25|min:2',
            'parent_id' => $ruleParentId,
        ];
    }
}

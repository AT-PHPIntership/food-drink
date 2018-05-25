<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,3})?$/',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:products,category_id',
            'preview' => 'required|string|max:255',
            'description' => 'string',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}

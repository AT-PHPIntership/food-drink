<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Product;

class CreateOrderRequest extends FormRequest
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
        $index = 0;
        $rules = [];
        foreach (request('product') as $input) {
            $product = Product::find($input['id']);
            $rules['product.'.$index.'.quantity'] = 'numeric|max:'.$product->quantity;
            $index++;
        }
        $rules['address'] = 'required';
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $index = 0;
        $messages = [];
        foreach (request('product') as $input) {
            $product = Product::find($input['id']);
            $messages['product.'.$index.'.quantity.max'] = 'The quantity product "'.$product->name.'" must be less than :max.';
            $index++;
        }
        return $messages;
    }
}

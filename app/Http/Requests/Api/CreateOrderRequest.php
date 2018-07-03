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
        foreach(request('product') as $input) {
            $product = Product::find($input['id']);
            $rules['product.'.$index.'.quantity'] = 'numeric|max:'.$product->quantity;
            $index++;
        }
        return $rules;
    }
}

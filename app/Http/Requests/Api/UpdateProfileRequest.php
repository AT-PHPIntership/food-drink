<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
        $user = Auth::user();
        $shippingId = 0;
        $arrayIdShipping = [];
        foreach ($user->shippingAddresses as $shipping) {
            $shippingId = $shipping->id;
            array_push($arrayIdShipping, $shippingId);
        }
        return [
            'name' => 'required|string|max:50',
            'password' => 'min:6|max:50',
            'address' => 'string|max:255',
            'phone' => 'required|min:10|numeric',
            'avatar' => 'image|mimes:png,jpg,jpeg',
            'shipping_id' => ($this->shipping_id == null) ? '' : 'in:'. implode(',', $arrayIdShipping),
        ];
    }
}

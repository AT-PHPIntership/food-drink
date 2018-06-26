<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'bail|required|string|max:50',
            'email' => 'bail|required|unique:users|email',
            'password' => 'bail|required|min:9|max:50',
            'address' => 'bail',
            'phone' => 'bail|required|min:10|numeric',
            'avatar' => 'image|mimes:png,jpg,jpeg',
        ];
    }
}

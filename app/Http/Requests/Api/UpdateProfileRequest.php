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
            'name' => 'required|string|max:50',
            'password' => (trim($this->password) == null) ? '' : 'required|min:6|max:50',
            'address' => 'string|max:255',
            'phone' => 'required|min:10|numeric',
            'avatar' => 'image|mimes:png,jpg,jpeg',
        ];
    }
}

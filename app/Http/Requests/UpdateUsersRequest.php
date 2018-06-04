<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'address'=>'string|max:255',
            'phone'=>'required|string|min:9|max:50',
            'avatar'=>'image|mimes:png,jpg,jpeg,svg,gif|max:10240',
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

class CreatePostRequest extends FormRequest
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
            'type' => 'in:' . Post::COMMENT . ',' . Post::REVIEW,
            'rate' => ($this->type == Post::REVIEW) ? 'required' : "" . 'integer|min:1|max:5',
            'content' => ($this->type == Post::COMMENT) ? 'required' : "" . 'string',
        ];
    }
}

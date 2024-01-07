<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
             'required',
             'max:32'
            ],
            'content' => [
             'required'
            ]
         ];
    }

    public function messages() {
        return [
            'title.required'   => 'The Post title is required',
            'title.max'        => 'The Post title must be less than 32 characters',
            'content.required' => 'The Post content is required',
            
        ];
    }
}

<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategory extends FormRequest
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
            'name' => [
                'required',
                'max:32',
                Rule::unique('categories', 'name')->ignore($this->category['id'])->withoutTrashed()
            ]
        ];
    }
    
    public function messages() {
        return [
            'name.required' => 'The Category name is required',
            'name.min'      => 'The Category name should not be of more than 32 characters',
            'name.unique'   => 'The Category name already exists', 
        ];
    }
}

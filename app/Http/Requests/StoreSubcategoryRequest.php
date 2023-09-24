<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'subcategory_name' => 'required|string|max:50|min:10',
            'category_id' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'subcategory_name.required' => 'name is required.',
            'category_id.required' => 'category is required.',
        ];
    }
}

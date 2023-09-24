<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:100|min:10',
            'short_desc' => 'required|string|max:200|min:20',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required.',
            'subcategory_id.required' => 'The subcategory field is required.',
            'short_desc.required' => 'The short description field is required.',
            'desc.required' => 'The description field is required.',
        ];
    }
}

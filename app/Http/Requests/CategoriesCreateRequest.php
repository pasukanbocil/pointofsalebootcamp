<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required|unique:categories,category_name'
        ];
    }

    public function atributes(): array
    {
        return [
            'category_name' => 'Nama Kategori'
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.unique' => 'Nama Kategori sudah ada',
            'category_name.required' => 'Nama Kategori harus diisi'
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'image' => ['required', 'file', 'mimes:jpg,png', 'max:500'],
            'description_tr' => ['required', 'string', 'max:1000', 'min:5'],
            'description_en' => ['required', 'string', 'max:1000', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'Alt Kategori',
            'title' => 'Ürün Adı',
            'image' => 'Ürün Görseli',
            'description_tr' => 'Ürün Açıklama (TR)',
            'description_en' => 'Ürün Açıklama (EN)',
        ];
    }
}

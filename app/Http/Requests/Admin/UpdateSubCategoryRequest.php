<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'parent_id' => ['required', 'integer', 'exists:categories,id'],
            'title_tr' => ['required', 'string', 'max:255', 'min:5'],
            'title_en' => ['required', 'string', 'max:255', 'min:5'],
            'image' => ['sometimes', 'file', 'mimes:jpg,png', 'max:1000'],
            'description_tr' => ['required', 'string', 'max:1000', 'min:5'],
            'description_en' => ['required', 'string', 'max:1000', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'parent_id' => __('admin/category.create.form.parent_id.label'),
            'title_tr' => 'Alt Kategori Adı (TR)',
            'title_en' => 'Alt Kategori Adı (EN)',
            'image' => __('admin/category.create.form.image'),
            'description_tr' => __('admin/category.create.form.description_tr.label'),
            'description_en' => __('admin/category.create.form.description_en.label'),
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'image' => ['sometimes', 'file', 'mimes:jpg,png', 'max:1000'],
            'description_tr' => ['required', 'string', 'max:1000', 'min:5'],
            'description_en' => ['required', 'string', 'max:1000', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('admin/category.create.form.title.label'),
            'image' => __('admin/category.create.form.image'),
            'description_tr' => __('admin/category.create.form.description_tr.label'),
            'description_en' => __('admin/category.create.form.description_en.label'),
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSimilarProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'similar_id' => ['required', 'exists:products,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'similar_id' => 'Ürün',
        ];
    }
}

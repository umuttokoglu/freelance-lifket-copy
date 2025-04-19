<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductFeatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'existing_features_ids'   => 'array',
            'existing_features_ids.*' => 'integer|exists:product_features,id',
            'existing_features_tr'    => 'array',
            'existing_features_en'    => 'array',
            'new_features_tr'         => 'array',
            'new_features_en'         => 'array',
        ];
    }
}

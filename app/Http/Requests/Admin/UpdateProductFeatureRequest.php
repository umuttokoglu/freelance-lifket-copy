<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'existing_features_ids' => 'nullable|array',
            'existing_features_ids.*' => 'integer',
            'existing_features' => 'nullable|array',
            'existing_features.*' => 'nullable|string|max:255',
            'new_features' => 'nullable|array',
            'new_features.*' => 'nullable|string|max:255',
        ];
    }
}

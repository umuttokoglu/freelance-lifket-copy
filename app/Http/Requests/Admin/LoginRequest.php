<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,spoof', 'max:255', 'min:6'],
            'password' => ['required', 'string', 'min:6'],
            'remember_me' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'E-posta',
            'password' => 'Şifre',
        ];
    }
}

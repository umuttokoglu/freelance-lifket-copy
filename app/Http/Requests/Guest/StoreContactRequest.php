<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['ip_address' => request()->ip()]);
    }

    public function rules(): array
    {
        return [
            'ip_address' => ['required', 'ip'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,spoof', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'İsim',
            'email' => 'E-posta',
            'message' => 'Mesaj',
        ];
    }
}

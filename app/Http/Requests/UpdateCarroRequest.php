<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'modelo_id' => ['nullable', 'integer', 'exists:modelos,id'],
            'placa' => ['nullable', 'string', 'max:10', 'unique:carros,placa'],
            'disponivel' => ['nullable', 'boolean'],
            'km' => ['nullable', 'integer', 'min:0'],
        ];
    }
}

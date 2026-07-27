<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'modelo_id' => ['required', 'integer', 'exists:modelos,id'],
            'placa' => ['required', 'string', 'max:10', 'unique:carros,placa'],
            'disponivel' => ['required', 'boolean'],
            'km' => ['required', 'integer', 'min:0'],
        ];
    }
}

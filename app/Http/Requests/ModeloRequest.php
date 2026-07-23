<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ModeloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('modelo')?->id;

        return [
            'marca_id' => ['required', 'exists:marcas,id'],
            'nome' => ['required', 'min:3', 'unique:modelos,nome,' . $id],
            'imagem' => ['required', 'file', 'mimes:png,jpeg,jpg'],
            'numero_portas' => ['required', 'integer', 'digits_between:1,5'],
            'lugares' => ['required', 'integer', 'digits_between:1,20'],
            'air_bag' => ['required', 'boolean'],
            'abs' => ['required', 'boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=>['required','unique:marcas'],
            'imagem'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'required'=>'O campo :attribute é obrigatorio',
            'unique'=> 'Já existe uma marca com esse nome'
        ];
    }
}

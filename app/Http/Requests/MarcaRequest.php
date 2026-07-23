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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('marca')?->id;
        return [
            'nome' => ['required', 'unique:marcas,nome,'.$id],
            'imagem' => ['required','image:png'], //aceitando apenas png
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatorio',
            'unique' => 'Já existe uma marca com esse nome',
            'image'=> 'O arquivo deve ser uma imagem do tipo png'
        ];
    }
}

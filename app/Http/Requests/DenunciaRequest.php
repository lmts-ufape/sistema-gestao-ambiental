<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenunciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'texto' => 'denúncia',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "empresa_id"        => request()->has('empresa_id') && strcmp($this->empresa_id, "none") == 0 ? 'nullable' : "nullable|integer",
            "empresa"           => "nullable|string|min:5|max:255|required_if:empresa_id,none",
            "endereco"          => "nullable|string|min:5|max:255|required_if:empresa_id,none",
            "texto"             => "required|string|min:10|max:500",
            "imagem.*"          => "nullable|file|mimes:jpg,bmp,png|max:2048",
            "comentario.*"      => "nullable|string|min:5|max:255",
        ];
    }

    public function messages()
    {
        return [
            "empresa_id.integer"    => "Selecione uma empresa",
            "imagem.*.max"          => "A imagem não pode ter mais de 2MB",
            "imagem.*.mimes"        => "A imagem deve estar no formato jpg, bmp ou png",
            "comentario.*.min"      => "O comentário deve ter no mínimo 5 caracteres",
            "comentario.*.max"      => "O comentário deve ter no máximo 255 caracteres",
            "empresa.required_if"   => "O campo nome da empresa é obrigatório quando nenhuma empresa é seleciona",
            "endereco.required_if"  => "O campo endereco da empresa é obrigatório quando nenhuma empresa é seleciona",
        ];
    }
}

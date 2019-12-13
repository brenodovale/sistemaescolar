<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idmatdisciplinas' => 'required',
            'nota' => 'required',
            'referencia' => 'required',
        ];
    }

    public function messages(){
        return[
            'idmatdisciplinas.required' => 'Selecione o Aluno e Disciplina ! ',
            'nota.required' => 'O campo nota não pode esta vazio',
        ];
    }
}

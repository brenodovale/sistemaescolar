<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
            'nomedisciplina' => 'required|unique:disciplinas',
            'idprofessor' => 'required',
            'valordisciplina' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomedisciplina.required' => 'O nome da Disciplina é Obrigatorio !',
            'idprofessor.required' => 'O nome do Professor é Obrigatorio !',
            'valordisciplina.required' => 'O valor da Disciplina é Obrigatorio !',
            'nomedisciplina.unique' => 'Ja existe uma Disciplina cadastrada com esse nome !',
            

        ];
    }
}

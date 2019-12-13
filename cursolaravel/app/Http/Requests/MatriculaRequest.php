<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
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
            'idcurso'           => 'required',
            'idaluno'           => 'required',
            'idsemestre'        => 'required',
            'idturma'           => 'required',
            'valormatricula'    => 'required',
        ];
    }

     public function messages()
    
    {
        return [
            'idcurso.required' => 'O nome do Curso é Obrigatorio !',
            'idaluno.required' => 'O nome do Aluno é Obrigatorio !',
            'idsemestre.required' => 'O nome do Semestre é Obrigatorio !',
            'idturma.required' => 'O nome da Turma é Obrigatorio !',
            'valormatricula.required' => 'O valor da Matricula é Obrigatorio !',
            
        ];
    }
}


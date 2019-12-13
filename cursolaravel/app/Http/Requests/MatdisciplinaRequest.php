<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatdisciplinaRequest extends FormRequest
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
            'idmatricula' => 'required',
            'iddisciplina' => 'required',
            'valor' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'idmatricula.required' => 'É obrigatorio selecionar um Aluno !',
            'iddisciplina.required' => 'É obrigatorio selecionar uma Disciplina !',
            'valor.required' => 'O valor é Obrigatorio !',
            

        ];
    }
}

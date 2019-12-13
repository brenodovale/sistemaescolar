<?php

namespace App\Http\Requests;



use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
use App\Aluno;
class AlunoRequestUpdate extends FormRequest
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
            'nomealuno' => 'required',
            'nmatricula' => [
                'required', "unique:alunos,nmatricula,{$this->input('id')}"],
        ];
    }

    public function messages(){
        return[
            'nomealuno.required' => 'O nome do Aluno é obrigatorio',
            'nmatricula.required' => 'O numero de matricula é obrigatorio',
            'nmatricula.unique' => 'Já existe um aluno com essa matricula cadastrada !'
           
        ];
    }
}

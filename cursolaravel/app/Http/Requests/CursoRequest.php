<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'nomecurso' => 'required|min:3|unique:cursos',
            'valorcurso' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomecurso.required' => 'O nome do Curso é Obrigatorio !',
            'valorcurso.required' => 'O valor do Curso é Obrigatorio !',
            'nomecurso.min' => 'O nome do Curso tem que ter no minimo 3 caracteres !',
            'nomecurso.unique' => 'Ja existe um Curso cadastrado com esse nome !',

        ];
    }


}

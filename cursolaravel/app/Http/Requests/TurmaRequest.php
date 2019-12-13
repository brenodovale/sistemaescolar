<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
            'nometurma' => 'required|unique:turmas',
        ];
    }

    public function messages(){
        return [
            'nometurma.required' => 'O nome da turma é obrigatorio',
            'nometurma.unique' => 'Ja existe essa Turma cadastrada'
        ];
    }
}

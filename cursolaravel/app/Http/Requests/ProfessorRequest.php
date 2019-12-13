<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'nomeprofessor' => 'required|min:3|unique:professors',
           
        ];
    }

    public function messages()
    {
        return [
            'nomeprofessor.required' => 'O nome do Professor é Obrigatorio !',
            'nomeprofessor.unique' => 'Ja existe um Professor cadastado com esse nome !'
            
        ];
    }
}

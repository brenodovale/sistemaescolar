<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemestreRequest extends FormRequest
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
            'ano' => 'required|unique:semestres',
        ];
    }

    public function messages(){
        return [
            'ano.required' => 'O ano do semestre é obrigatorio',
            'ano.unique' => 'Ja existe esse Ano do semestre cadastrado !'
        ];
    }
}

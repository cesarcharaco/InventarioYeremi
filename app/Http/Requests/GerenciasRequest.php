<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GerenciasRequest extends FormRequest
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
            'gerencia' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'gerencia.required' => 'El nombre de la gerencia no puede estar vacío'
        ];
    }
}

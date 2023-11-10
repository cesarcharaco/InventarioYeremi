<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumosUpdateRequest extends FormRequest
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
            'producto' => 'required',
            'descripcion' => 'required',
            'stock_min' => 'required|numeric',
            'stock_max' => 'required|numeric',
            'deposito_g' => 'required|numeric',
            'deposito_v' => 'required|numeric',
            'local_g' => 'required|numeric',
            'local_v' => 'required|numeric'
        ];
    }

    public function mesagges()
    {
        return [
            'producto.required' => 'El nombre del insumo es obligatorio',
            'descripcion.required' => 'La Descripción del insumo es obligatoria',
            'stock_min.required' => 'El Stock Mínimo del insumo es obligatorio',
            'stock_max.required' => 'El Stock Máximo del insumo es obligatorio',
            'deposito_g.required' => 'La Cantidad que hay en el Depósito de Guaribe es obligatoria',
            'deposito_v.required' => 'La Cantidad que hay en el Depósito del Valle es obligatoria',
            'local_g.required' => 'La Cantidad que hay en el Local de Guaribe es obligatoria',
            'local_v.required' => 'La Cantidad que hay en el Local del Valle es obligatoria',
            'stock_min.numeric' => 'El Stock Mínimo del insumo solo debe contener números',
            'stock_max.numeric' => 'La Stock Máximo del insumo solo debe contener números',
            'deposito_g.numeric' => 'La Cantidad del insumo en el Depósito de Guaribe solo debe contener números',
            'deposito_v.numeric' => 'La Cantidad del insumo en el Depósito del Valle solo debe contener números',
            'local_g.numeric' => 'La Cantidad del insumo en el Local de Guaribe solo debe contener números',
            'local_v.numeric' => 'La Cantidad del insumo en el Local del Valle solo debe contener números'
        ];   
    }
}

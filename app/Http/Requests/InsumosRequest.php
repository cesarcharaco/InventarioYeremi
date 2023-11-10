<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumosRequest extends FormRequest
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
            'deposito' => 'required|numeric',
            'local' => 'required|numeric'
        ];
    }

    public function mesagges()
    {
        return [
            'producto.required' => 'El nombre del insumo es obligatorio',
            'descripcion.required' => 'La Descripción del insumo es obligatoria',
            'stock_min.required' => 'El Stock Mínimo del insumo es obligatorio',
            'stock_max.required' => 'El Stock Máximo del insumo es obligatorio',
            'deposito.required' => 'La Cantidad que hay en el Depósito es obligatoria',
            'local.required' => 'La Cantidad que hay en el Local es obligatoria',
            'stock_min.numeric' => 'El Stock Mínimo del insumo solo debe contener números',
            'stock_max.numeric' => 'La Stock Máximo del insumo solo debe contener números',
            'deposito.numeric' => 'La Cantidad del insumo en el Depósito solo debe contener números',
            'local.numeric' => 'La Cantidad del insumo en el Local solo debe contener números'
        ];   
    }
}

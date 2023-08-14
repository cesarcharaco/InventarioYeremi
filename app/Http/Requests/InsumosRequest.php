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
            'serial' => 'required',
            'ubicacion' => 'required',
            'existencia' => 'required|numeric',
            'in_almacen' => 'required|numeric',
            'out_almacen' => 'required|numeric',
            'disponibles' => 'required|numeric'
        ];
    }

    public function mesagges()
    {
        return [
            'producto.required' => 'El nombre del insumo es obligatorio',
            'descripcion.required' => 'La Descripción del insumo es obligatoria',
            'serial.required' => 'El Serial es obligatorio',
            'ubicacion.required' => 'La Ubicación del insumo es obligatoria',
            'existencia.required' => 'La Existencia del insumo es obligatoria',
            'in_almacen.required' => 'La Cantidad que hay en el almacen es obligatoria',
            'out_almacen.required' => 'La Cantidad que hay prestada es obligatoria',
            'disponibles.required' => 'La Cantidad que hay disponible es obligatoria',
            'existencia.numeric' => 'La existencia del insumo solo debe contener números',
            'in_almacen.numeric' => 'La Cantidad que hay en el almacen del insumo solo debe contener números',
            'out_almacen.numeric' => 'La Cantidad que hay prestada del insumo solo debe contener números',
            'disponibles.numeric' => 'La Cantidad que hay disponible del insumo solo debe contener números'
        ];   
    }
}

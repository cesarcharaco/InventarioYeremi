<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table='insumos';

    protected $fillable=['producto','descripcion','serial'];


    public function salidas()
    {
    	return $this->hasMany('App\Salida','id_insumo','id');
    }

    public function insumosc()
    {
        return $this->hasOne('App\Insumosc','id_insumo','id');
    }
}

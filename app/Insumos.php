<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table='insumos';

    protected $fillable=['producto','descripcion','serial','stock_min','stock_max','deposito','local','id_local'];


    public function salidas()
    {
    	return $this->hasMany('App\Salida','id_insumo','id');
    }

    public function local()
    {
    	return $this->belongsTo('App\Local','id_local','id');
    }
}

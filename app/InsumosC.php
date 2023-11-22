<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumosC extends Model
{
    protected $table='insumos_has_cantidades';

    protected $fillable=['stock_min','stock_max','deposito','local','id_local','id_insumo'];

    public function insumos()
    {
    	return $this->belongsTo('App\Insumos','id_insumo','id');
    }

    public function local()
    {
    	return $this->belongsTo('App\Local','id_local','id');
    }
}

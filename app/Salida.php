<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table="salidas";

    protected $fillable=['id_insumo','id_local','cantidad','tipo_salida','observacion'];

    public function insumo()
    {
    	return $this->belongsTo('App\Insumos','id_insumo');
    }

    public function local()
    {
    	return $this->hasMany('App\Salida','id_local','id');
    }
}

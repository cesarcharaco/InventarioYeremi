<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table="salida";

    protected $fillable=['id_insumo','local','cantidad','tipo_salida','observacion'];

    public function insumo()
    {
    	return $this->belongsTo('App\Insumos','id_insumo');
    }
}

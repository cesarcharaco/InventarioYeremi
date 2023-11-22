<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    protected $table='incidencias';

    protected $fillable=['id_insumo','cantidad','tipo','observacion','fecha_incidencia','descontar'];

    
    public function insumos()
    {
    	return $this->belongsTo('App\Insumos','id_insumo');
    }

    public function historial()
    {
    	return $this->hasMany('App\HistorialIncidencias','id_incidencia','id');
    }
}

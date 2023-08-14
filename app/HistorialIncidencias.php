<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialIncidencias extends Model
{
    protected $table='historial_incidencias';

    protected $fillable=['id_incidencia','codigo'];

    public function incidencias()
    {
    	return $this->belongsTo('App\Incidencias','id_incidencia');
    }
}

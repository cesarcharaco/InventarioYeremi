<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $table='prestamos';

    protected $fillable=['id_solicitante','id_insumo','tipo','observacion','fecha_prestamo','fecha_entrega','status','cantidad'];

    public function solicitantes()
    {
    	return $this->belongsTo('App\Solicitantes','id_solicitante');
    }

    public function insumos()
    {
    	return $this->belongsTo('App\Insumos','id_insumo');
    }

    public function historial()
    {
    	return $this->hasMany('App\HistorialPrestamos','id_prestamo','id');
    }
    
}

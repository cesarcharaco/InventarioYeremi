<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitantes extends Model
{
    protected $table='solicitantes';

    protected $fillable=['nombres','rut','email','telefono','status'];

    public function prestamos()
    {
    	return $this->belongsToMany('App\Insumos','prestamos','id_solicitante','id_insumo')->withPivot('tipo','observacion','fecha_prestamo','fecha_devuelto','status','cantidad');
    }

}

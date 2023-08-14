<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialPrestamos extends Model
{
    protected $table='historial_prestamos';

    protected $fillable=['id_prestamo','codigo'];

    public function prestamos()
    {
    	return $this->belongsTo('App\Prestamos','id_prestamo');
    }
}

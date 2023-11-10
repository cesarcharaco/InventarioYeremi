<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    protected $table='participantes';

    protected $fillable=['nombres','apellidos','cedula'];

    public function sans()
    {
    	return $this->belongsToMany('App/Sans','sans_has_participantes','id_participante','id_sans')->withPivot('posicion','fecha_entrega');
    }

    public function pagos()
    {
    	return $this->belongsTo('App\Pagos','id_participante','id');
    }
}

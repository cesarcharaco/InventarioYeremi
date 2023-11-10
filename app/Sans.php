<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sans extends Model
{
    protected $table='sans';

    protected $fillable=['codigo','descripcion','fecha_inicio','fecha_fin','modalidad','monto_total','monto_cuota'];


    public function objetos()
    {
    	return $this->belongsToMany('App/Objetos','sans_has_objetos','id_sans','id_objetos');
    }

    public function participantes()
    {
    	return $this->belongsToMany('App/Participantes','sans_has_participantes','id_sans','id_participante')->withPivot('posicion','fecha_entrega');
    }

    public function cuotas()
    {
        return $this->hasMany('App\Cuotas','id_san','id');
    }
}

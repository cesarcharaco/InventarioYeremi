<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table='pagos';

    protected $fillable=['id_cuota','id_participante','status','forma_pago','fecha','codigo','observacion'];

    public function cuotas
    {
    	return $this->hasMany('App\Cuotas','id_cuota','id');
    }

    public function participantes()
    {
    	return $this->hasMany('App\Participantes','id_participante','id');
    }
}
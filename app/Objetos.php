<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetos extends Model
{
    protected $table='objetos';

    protected $fillable=['objeto'];

    public function sans()
    {
    	return $this->belongsToMany('App/Sans','sans_has_objetos','id_objetos','id_sans');
    }
}

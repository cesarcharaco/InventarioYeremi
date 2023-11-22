<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table='local';

    protected $fillable=['nombre','estado'];

    public function insumosc()
    {
    	return $this->hasOne('App\Insumos','id_local','id');
    }

    public function user()
    {
    	return $this->belongsToMany('App\User','users_has_local','id_local','id_user')->withPivot('status');
    }

    public function salida()
    {
        return $this->belongsTo('App\Salida','id_local','id');
    }
}

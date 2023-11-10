<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuotas extends Model
{
    protected $table='cuotas';

    protected $fillable=['fecha','id_san'];

    public function sans()
    {
    	return $this->belongsTo('App\Sans','id_sans','id');
    }

    public function pagos()
    {
    	return $this->belongsTo('App\Pagos','id_cuota','id');
    }
}

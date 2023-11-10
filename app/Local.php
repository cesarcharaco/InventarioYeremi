<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table='local';

    protected $fillable=['nombre','estado'];

    public function insumos()
    {
    	return $this->hasMany('App\Insumos','id_local','id');
    }
}

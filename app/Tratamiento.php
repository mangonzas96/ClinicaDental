<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['proxcita','observaciones'];

    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }

    public function sesion(){
        return $this->hasMany('App\Sesion');
    }

    public function gabinete(){
        return $this->belongsTo('App\Gabinete');
    }
}

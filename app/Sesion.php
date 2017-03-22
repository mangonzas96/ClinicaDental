<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    //
    protected $fillable = ['observaciones'];

    public function tratamiento(){
        return $this->belongsTo('App\Tratamiento');
    }

    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }

    public function gabinete(){
        return $this->belongsTo('App\Gabinete');
    }

    public function odontologo(){
        return $this->belongsTo('App\Odontologo');
    }
}

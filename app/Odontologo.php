<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
    //
    protected $fillable = ['especialidad','sueldo'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function paciente(){
        return $this->belongsToMany('App\Paciente');
    }

    public function tratamiento(){
        return $this->hasMany('App\Tratamiento');
    }

    public function gabinete(){
        return $this->hasMany('App\Gabinete');
    }

}

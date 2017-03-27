<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
    //
    protected $fillable = ['especialidad'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function paciente(){
        return $this->belongsToMany('App\Paciente');
    }

    public function tratamiento(){
        return $this->hasMany('App\Tratamiento');
    }

}

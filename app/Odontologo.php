<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
    //
    protected $fillable = ['name','apellido','dni','telefono','email','direccion','especialidad','sueldo','created_at', 'updated_at'];

    protected $table = 'odontologos';

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

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'dni', 'telefono', 'correo', 'direccion', 'password',];

    public function paciente(){
        return $this->hasOne('App\Paciente');
    }

    public function odontologo(){
        return $this->hasOne('App\Odontologo');
    }

    public function personalextra(){
        return $this->hasOne('App\PersonalExtra');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['seguro', 'infoGeneral'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    //
    public function odontologo(){
        return $this->belongsToMany('App\Odontologo');
    }
}

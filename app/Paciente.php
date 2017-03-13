<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['seguro', 'infoGeneral'];

    public function persona(){
        return $this->belongsTo('App\Persona');
    }
    //
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    //
    protected $fillable = ['observaciones'];

    public function tratamiento(){
        return $this->belongsToMany('App\Tratamiento');
    }
}

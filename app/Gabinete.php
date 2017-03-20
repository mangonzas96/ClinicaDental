<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gabinete extends Model
{
    //
    protected $fillable = ['especificaciones'];

    public function tratamiento(){
        return $this->hasMany('App\Tratamiento');
    }
}

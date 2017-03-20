<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalExtra extends Model
{
    //
    protected $fillable = ['trabajo','sueldo'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

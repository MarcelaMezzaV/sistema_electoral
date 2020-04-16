<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //relacionando con la tabla usuarios
    public function users(){
        return $this->belongsToMany('App\user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
    use HasFactory;

    //Relación uno a muchos (inversa)
    public function actividad(){
        return $this->belongsTo('App\Models\Actividad');
    }

    //Relacion muchos a muchost
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}

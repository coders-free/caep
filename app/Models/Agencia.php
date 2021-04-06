<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    //Relacion uno a uno
    public function ejecutivo(){
        return $this->hasOne(Ejecutivo::class);
    }

    public function comunas(){
        return $this->hasMany(Comuna::class);
    }

}

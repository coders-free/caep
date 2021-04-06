<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = "regiones";

    //Relacion uno a muchos
    public function comunas(){
        return $this->hasMany(Comuna::class);
    }

    //Relacion muchos a muchos
    public function agencias(){
        return $this->belongsToMany(Agencia::class, 'comunas');
    }

}

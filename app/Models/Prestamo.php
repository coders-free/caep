<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }


    //Relacion muchos a muchos
    public function cuotas(){
        return $this->belongsToMany(Cuota::class);
    }

    /* public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    } */
}

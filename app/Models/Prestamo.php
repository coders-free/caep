<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}

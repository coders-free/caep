<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    use HasFactory;

    protected $table = "avales";

    protected $fillable = ['name', 'rut'];

    public function avalable()
    {
        return $this->morphTo();
    }

    //Relacion uno a uno polimorfica
    public function identificacion()
    {
        return $this->morphOne(Identificacion::class, 'identificacionable');
    }

    public function trabajo()
    {
        return $this->morphOne(Trabajo::class, 'trabajoable');
    }

    public function bancario()
    {
        return $this->morphOne(Bancario::class, 'bancarioable');
    }
}

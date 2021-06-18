<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const APROBADO = 3;
    const RECHAZADO = 4;

    protected $table = "solicitudes";

    protected $guarded = ["id", "created_at", "updated_at", "status"];

    //Relacion uno a uno
    public function detalle_prestamo(){
        return $this->hasOne(DetallePrestamo::class);
    }

    //Relacion uno a muchos
    public function notes(){
        return $this->hasMany(Note::class);
    }

    //Relacion uno a muchos inversa

    public function imponente(){
        return $this->belongsTo(Imponente::class, 'imponente_rut');
    }

    public function prestamo(){
        return $this->belongsTo(Prestamo::class);
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

    public function aval()
    {
        return $this->morphOne(Aval::class, 'avalable');
    }

    //Relacion polimorfica uno a muchos
    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }
}

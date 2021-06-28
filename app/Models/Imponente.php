<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imponente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rut', 'fondos'];

    protected $primaryKey = 'rut';
    public $incrementing = false;
    
    //Relacion uno a uno inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muhos
    public function creditos(){
        return $this->hasMany(Credito::class, 'imponente_rut', 'rut');
    }

    public function solicitudes(){
        return $this->hasMany(Solicitud::class, 'imponente_rut', 'rut');
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


    //Relacion uno a muchos polimorfica

    public function avales()
    {
        return $this->morphMany(Aval::class, 'avalable');
    }

}

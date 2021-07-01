<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $dates = ['fecha_cierre'];

    protected $guarded = ['created_at', 'updated_at'];

    //relacion uno a muchos imponente
    public function imponente(){
        return $this->belongsTo(Imponente::class, 'imponente_rut');
    }

    public function prestamo(){
        return $this->belongsTo(Prestamo::class);
    }
}

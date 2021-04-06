<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'solicitud_id'];

    //Relacion uno a muchos inversa

    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }
}

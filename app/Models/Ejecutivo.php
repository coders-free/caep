<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'agencia_id'];

    //Relacion uno a uno inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function agencia(){
        return $this->belongsTo(Agencia::class);
    }
}

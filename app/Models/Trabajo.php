<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    protected $dates = ['antiguedad'];

    //Relacion uno a muchos inversa

    /* public function cargo(){
        return $this->belongsTo(Cargo::class);
    } */

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function comuna(){
        return $this->belongsTo(Comuna::class);
    }

    //Relacion polimorfica
    public function trabajoable()
    {
        return $this->morphTo();
    }
}

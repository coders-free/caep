<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancario extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    //Relacion uno a muchos inversa
    public function envio(){
        return $this->belongsTo(Envio::class);
    }

    public function tipo(){
        return $this->belongsTo(Tiipo::class);
    }
    
    //Relacion polimorfica
    public function bancarioable()
    {
        return $this->morphTo();
    }
}

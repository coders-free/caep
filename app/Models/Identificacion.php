<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificacion extends Model
{
    use HasFactory;

    protected $table = "identificaciones";

    protected $dates = ['fecha_nacimiento'];

    protected $guarded = ["id", "created_at", "updated_at"];

    //Relacion uno a muchos inversa
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }

    public function estadoCivil(){
        return $this->belongsTo(EstadoCivil::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function comuna(){
        return $this->belongsTo(Comuna::class);
    }

    //Relacion polimorfica
    public function identificacionable()
    {
        return $this->morphTo();
    }

    //Accesor
   /*  public function getFechaNacimientoAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    } */
}

<?php

namespace App\Http\Livewire;

use App\Models\Comuna;
use App\Models\EstadoCivil;
use App\Models\Identificacion;
use App\Models\Region;
use App\Models\Sexo;
use Carbon\Carbon;
use Livewire\Component;

class EditIdentificacion extends Component
{

    public $identificacion, $fecha_nacimiento;

    protected $rules = [
        'identificacion.direccion'          => 'required',
        'identificacion.region_id'          => 'required',
        'identificacion.comuna_id'          => 'required',
        'identificacion.fecha_nacimiento'   => 'required',
        'identificacion.sexo_id'            => 'required',
        'identificacion.estado_civil_id'    => 'required',
        'identificacion.separacion'         => 'required',
        'identificacion.celular'            => 'required',
    ];

    public function mount(Identificacion $identificacion){
        $this->identificacion = $identificacion;

        /* if($this->fecha_nacimiento){
            $this->fecha_nacimiento = $this->identificacion->fecha_nacimiento->format('d/m/Y');
        } */

        if ($identificacion->fecha_nacimiento) {
            $this->fecha_nacimiento = $identificacion->fecha_nacimiento->format('d/m/Y');
        }
        
    }

    public function render()
    {

        $regiones = Region::all();
        $sexos = Sexo::all();
        $estados_civiles = EstadoCivil::all();

        return view('livewire.edit-identificacion', compact('regiones', 'sexos', 'estados_civiles'));
    }

    public function getComunasProperty()
    {
        return Comuna::where('region_id', $this->identificacion->region_id)->get();
        
    }

    public function update(){
        if ($this->fecha_nacimiento) {
        
            $this->identificacion->fecha_nacimiento = Carbon::createFromFormat('d/m/Y', $this->fecha_nacimiento);
        }
        $this->identificacion->save();

        $this->emit('saved');
    }
}

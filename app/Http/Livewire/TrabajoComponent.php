<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\Trabajo;
use Carbon\Carbon;
use Livewire\Component;

class TrabajoComponent extends Component
{
    public $trabajo, $antiguedad;

    protected $rules = [
        'trabajo.reparticion' => 'required',
        'trabajo.cargo'    => 'required',
        'antiguedad'  => 'required',
        'trabajo.direccion'   => 'required',
        'trabajo.region_id'   => 'required',
        'trabajo.comuna_id'   => 'required',
    ];

    public function mount(Trabajo $trabajo){
        
        $this->trabajo = $trabajo;

        if (!$this->trabajo->cargo_id) {
            $this->trabajo->cargo_id = "";
        }

        if (!$this->trabajo->region_id) {
            $this->trabajo->region_id = "";
        }


        if (!$this->trabajo->comuna_id) {
            $this->trabajo->comuna_id = "";
        }


        if ($this->trabajo->antiguedad) {
            $this->antiguedad = $this->trabajo->antiguedad->format('d/m/Y');
        }
    }

    public function render()
    {

        $cargos = Cargo::all();
        $regiones = Region::all();

        return view('livewire.trabajo-component', compact('cargos', 'regiones'));
    }

    public function getComunasProperty()
    {
        return Comuna::where('region_id', $this->trabajo->region_id)->get();
        
    }

    public function update(){

        $this->validate();
        
        if ($this->antiguedad) {
            $this->trabajo->antiguedad = Carbon::createFromFormat('d/m/Y', $this->antiguedad);
        }

        $this->trabajo->complete = 1;

        $this->trabajo->save();

        $this->emit('saved');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\Trabajo;
use Carbon\Carbon;
use Livewire\Component;

class EditTrabajo extends Component
{
    public $trabajo, $antiguedad;

    protected $rules = [
        'trabajo.reparticion' => 'required',
        'trabajo.cargo_id'    => 'required',
        'trabajo.antiguedad'  => 'required',
        'trabajo.direccion'   => 'required',
        'trabajo.region_id'   => 'required',
        'trabajo.comuna_id'   => 'required',
    ];

    public function mount(Trabajo $trabajo){
        $this->trabajo = $trabajo;

        if ($this->trabajo->antiguedad) {
            $this->antiguedad = $this->trabajo->antiguedad->format('d/m/Y');
        }
    }

    public function render()
    {

        $cargos = Cargo::all();
        $regiones = Region::all();

        return view('livewire.edit-trabajo', compact('cargos', 'regiones'));
    }

    public function getComunasProperty()
    {
        return Comuna::where('region_id', $this->trabajo->region_id)->get();
        
    }

    public function update(){
        
        if ($this->antiguedad) {
            $this->trabajo->antiguedad = Carbon::createFromFormat('d/m/Y', $this->antiguedad);
        }

        $this->trabajo->save();
    }
}

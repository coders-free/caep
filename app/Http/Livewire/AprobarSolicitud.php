<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

class AprobarSolicitud extends Component
{

    public $solicitud, $status, $mensaje;

    protected $rules = [
        'solicitud.status' => 'required'
    ];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function update(){
        $this->validate();

        $this->solicitud->user_id = auth()->user()->id;

        $this->solicitud->save();
    }

    public function render()
    {
        return view('livewire.aprobar-solicitud');
    }
}

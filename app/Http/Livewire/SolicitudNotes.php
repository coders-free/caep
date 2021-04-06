<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

class SolicitudNotes extends Component
{

    public $solicitud, $mensaje;

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function save(){
        $this->solicitud->notes()->create([
            'name' => $this->mensaje
        ]);

        $this->reset('mensaje');
        $this->emit('saved');

        $this->emitTo('bitacora', 'render');
    }

    public function render()
    {
        return view('livewire.solicitud-notes');
    }
}

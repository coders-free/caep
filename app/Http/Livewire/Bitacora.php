<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

class Bitacora extends Component
{
    public $solicitud;

    protected $listeners = ['render'];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function render()
    {

        $notes = $this->solicitud->notes;

        return view('livewire.bitacora', compact('notes'));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SolicitudesAsignadas extends Component
{
    public function render()
    {
        return view('livewire.solicitudes-asignadas')->layout('layouts.ejecutivo');;
    }
}

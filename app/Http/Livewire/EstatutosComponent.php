<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RegistroEstatutos;

class EstatutosComponent extends Component
{
    public function guardaAceptacion(){
        $registro = new RegistroEstatutos();

        $registro->rut = auth()->user()->imponente->rut;

        $registro->save();

    }
    
    public function render()
    {
        return view('livewire.estatutos-component');
    }
}

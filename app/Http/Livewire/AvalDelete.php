<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AvalDelete extends Component
{

    public $open = false;
    public $aval;


    public function delete(){
        $this->aval->delete();

        $this->reset('open');

        $this->emitTo('aval-index','render');
    }

    public function render()
    {
        return view('livewire.aval-delete');
    }
}

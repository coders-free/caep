<?php

namespace App\Http\Livewire;

use App\Models\Aval;
use Livewire\Component;

class AvalEdit extends Component
{
    public $aval;

    protected $rules = [
        'aval.name' => 'required',
        'aval.rut'  => 'required|numeric'
    ];

    public function mount(Aval $aval){
        $this->aval = $aval;
    }

    public function update(){

        $this->validate();

        $this->aval->save();

        $this->emitSelf('saved');
    }

    public function render()
    {
        return view('livewire.aval-edit');
    }
}

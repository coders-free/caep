<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;

class RetiroEdit extends Component
{

    public $solicitud;

    protected $rules = [
        'solicitud.monto' => 'required|numeric'
    ];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(){

        $this->validate();

        $this->solicitud->save();

        $this->emit('saved');
        
    }

    public function render()
    {
        return view('livewire.retiro-edit');
    }
}

<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Cuota;
use App\Models\Prestamo;
use Livewire\Component;

class CreatePrestamo extends Component
{
    public $prestamo, $cuotas;
    public $prestamo_cuotas = [];
    public $open = false;

    public $rules = [
        'prestamo.name' => 'required',
    ];

    protected $messages = [
        'prestamo.name.required' => 'El nombre del prestamo es requerido.',
    ];

    public function mount(){

        $this->cuotas = Cuota::all();
    }

    public function create(){

        $this->open = true;

        $this->prestamo = new Prestamo();
    }

    public function save(){

        $this->validate();

        $this->prestamo->save();

        $cuotas = collect($this->prestamo_cuotas)->diff(false);

        $this->prestamo->cuotas()->sync($cuotas);

        $this->reset(['prestamo_cuotas', 'open']);

        $this->emit('render');

    }

    

    public function render()
    {
        return view('livewire.administrador.create-prestamo');
    }
}

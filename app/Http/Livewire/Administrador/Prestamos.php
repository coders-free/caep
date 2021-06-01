<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Prestamo;
use App\Models\Cuota;
use Livewire\Component;

use Livewire\WithPagination;

class Prestamos extends Component
{

    use WithPagination;

    public $search;
    public $open = false;

    public $prestamo, $cuotas;
    public $prestamo_cuotas = [];

    protected $listeners = ['render'];

    public function mount(){
        $this->cuotas = Cuota::all();
    }

    public $rules = [
        'prestamo.name' => 'required',
        'prestamo.active' => 'required',
    ];

    protected $messages = [
        'prestamo.name.required' => 'El nombre del prestamo es requerido.',
    ];


    public function edit(Prestamo $prestamo){
        $this->prestamo = $prestamo;

        $this->prestamo_cuotas = $prestamo->cuotas->pluck('id', 'id')->toArray();;
        
        $this->open = true;
    }

    public function save(){

        $this->validate();

        $this->prestamo->save();

        $cuotas = collect($this->prestamo_cuotas)->diff(false);

        $this->prestamo->cuotas()->sync($cuotas);

        $this->open = false;


    }

    public function render()
    {

        $prestamos = Prestamo::where('name', 'like', '%' . $this->search . '%')
                            ->latest('id')
                            ->paginate(10);

        return view('livewire.administrador.prestamos', compact('prestamos'))
                    ->layout('layouts.administrador');
    }
}

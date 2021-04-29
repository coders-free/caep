<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;

class PrestamoComponent extends Component
{
    public $prestamos, $name;

    protected $rules = [
        'prestamos.*.name' => 'required|string',
        'prestamos.*.active' => 'required',
    ];

    protected $validationAttributes = [
        'prestamos.*.name' => 'prestamo'
    ];

    public function mount(){
        $this->prestamos = Prestamo::latest('id')->get();
    }

    public function save(){

        $this->validate([
            'name' => 'required|string'
        ]);

        Prestamo::create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->prestamos = Prestamo::latest('id')->get();
    }
    
    public function update(){
        $this->validate();

        foreach ($this->prestamos as $prestamo) {
            $prestamo->save();
        }
    }

    public function render()
    {
        return view('livewire.prestamo-component')
                    ->layout('layouts.administrador');
    }
}

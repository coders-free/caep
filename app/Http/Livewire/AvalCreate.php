<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AvalCreate extends Component
{

    public $open = false;
    public $imponente, $name, $rut;

    protected $rules = [
        'name' => 'required',
        'rut' => 'required',
    ];

    public function save(){
        $this->validate();

        $aval = $this->imponente->avales()->create([
            'name' => $this->name,
            'rut' => $this->rut
        ]);

        $aval->identificacion()->create();
        $aval->trabajo()->create();

        return redirect()->route('avales.edit', $aval);

    }

    public function render()
    {
        return view('livewire.aval-create');
    }
}

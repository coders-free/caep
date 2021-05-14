<?php

namespace App\Http\Livewire;

use App\Models\Bancario;
use App\Models\Envio;
use App\Models\Tipo;
use Livewire\Component;

class BancarioEdit extends Component
{

    public $bancario;

    protected $rules = [
        'bancario.envio_id'         => 'required',
        'bancario.agencia'          => 'required',
        'bancario.tipo_id'          => 'required',
        'bancario.banco'            => 'required',
        'bancario.numero_cuenta'    => 'required',
    ];

    public function mount(Bancario $bancario){
        $this->bancario = $bancario;
    }

    public function render()
    {

        $envios = Envio::all();
        $tipos = Tipo::all();

        return view('livewire.bancario-edit', compact('envios', 'tipos'));
    }

    public function update(){
        $this->bancario->save();

        $this->emit('saved');
    }
}

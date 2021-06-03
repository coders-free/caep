<?php

namespace App\Http\Livewire;

use App\Models\Agencia;
use App\Models\Bancario;
use App\Models\Envio;
use App\Models\Tipo;
use Livewire\Component;

class BancarioEdit extends Component
{

    public $bancario, $agencias;

    protected $rules = [
        'bancario.envio_id'         => 'required',
        'bancario.agencia'          => 'string',
        'bancario.tipo_id'          => 'required',
        'bancario.banco'            => 'required',
        'bancario.numero_cuenta'    => 'required',
    ];

    public function mount(Bancario $bancario){
        $this->bancario = $bancario;

        $this->agencias = Agencia::all();
    }

    public function render()
    {
        

        $envios = Envio::all();
        $tipos = Tipo::all();

        return view('livewire.bancario-edit', compact('envios', 'tipos'));
    }

    public function update(){

        $rules = $this->rules;
        if($this->bancario->envio_id == 4) {
            $rules['bancario.agencia'] = 'required';
        }

        $this->validate($rules);

        $this->bancario->complete = 1;

        $this->bancario->save();

        $this->emit('saved');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Agencia;
use Livewire\Component;

class CreateUser extends Component
{

    public $name, $email, $password, $password_confirmation, $agencias, $agencia_id;
    public $open = false;
    public $rol = "ejecutivo";

    public function mount(){
        $this->agencias = Agencia::all();

        $this->agencia_id = $this->agencias->first()->id;
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    public function render()
    {
        return view('livewire.create-user');
    }


    public function create(){

        if ($this->rol == 'ejecutivo') {
            $this->rules['agencia_id'] = 'required';
        }

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $user->assignRole($this->rol);

        if ($this->rol == 'ejecutivo') {
            $user->ejecutivo()->create([
                'agencia_id' => $this->agencia_id
            ]);
        }

        $this->reset(['name', 'email', 'password', 'password_confirmation', 'open', 'rol']);

        $this->emitTo('user-roles', 'render');
    }
}

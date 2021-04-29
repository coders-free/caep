<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{

    public $name, $email, $password, $password_confirmation;
    public $open = false;
    public $rol = "imponente";

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
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $user->assignRole($this->rol);

        $this->reset(['name', 'email', 'password', 'password_confirmation', 'open', 'rol']);

        $this->emitTo('user-roles', 'render');
    }
}

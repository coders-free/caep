<?php

namespace App\Http\Livewire\Administrador;

use Livewire\Component;

class EditUser extends Component
{

    public $user, $name, $email, $password, $password_confirmation, $rol;

    public $open = false;

    public function mount(){
        $this->name = $this->user->name;
        $this->email = $this->user->email;   
        
        $this->rol = $this->user->roles->first()->name;
    }

    public function render()
    {
        return view('livewire.administrador.edit-user');
    }

    public function update(){

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
        ];

        if($this->password){
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $this->validate($rules);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if($this->password){
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        $this->user->syncRoles([$this->rol]);
        
        $this->emitTo('user-roles', 'render');

        $this->reset('open');

    }
}

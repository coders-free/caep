<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Agencia;
use Livewire\Component;

class EditUser extends Component
{

    public $user, $name, $email, $password, $password_confirmation, $rol, $agencias, $agencia_id;

    public $open = false;

    public function mount()
    {

        $this->agencias = Agencia::all();

        if ($this->user->hasRole('ejecutivo')) {
            $this->agencia_id = $this->user->ejecutivo->agencia_id;
        } else {
            $this->agencia_id = $this->agencias->first()->id;
        }

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->rol = $this->user->roles->first()->name;
    }

    public function open()
    {
        $this->open = true;
    }

    public function update()
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
        ];

        if ($this->password) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        if ($this->rol == 'ejecutivo') {
            $rules['agencia_id'] = 'required';
        }

        $this->validate($rules);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        $this->user->syncRoles([$this->rol]);

        if ($this->rol == 'ejecutivo') {

            if ($this->user->ejecutivo) {

                $this->user->ejecutivo->update([
                    'agencia_id' => $this->agencia_id
                ]);

            } else {

                $this->user->ejecutivo()->create([
                    'agencia_id' => $this->agencia_id
                ]);
                
            }
        }

        $this->emit('render');

        $this->reset('open');
    }

    public function render()
    {
        return view('livewire.administrador.edit-user');
    }
}

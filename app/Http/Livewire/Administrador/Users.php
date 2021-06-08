<?php

namespace App\Http\Livewire\Administrador;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;

    public $search, $user;

    protected $listeners = ['render', 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(User $user)
    {

        $this->user = $user;
        $this->open = true;
    }


    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {

        $users = User::where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                })->whereHas('roles', function(Builder $query){
                    $query->where('name', "<>", 'imponente');
                })
                ->where('id', '!=', auth()->user()->id)
                    ->latest('id')
                    ->paginate(10);
     

        return view('livewire.administrador.users', compact('users'));
    }
}

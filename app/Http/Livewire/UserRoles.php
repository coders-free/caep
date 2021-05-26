<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UserRoles extends Component
{

    use WithPagination;

    public $search, $user;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(User $user)
    {

        $this->user = $user;
        $this->open = true;
    }


    public function update()
    {
    }

    public function render()
    {

        /*$users = User::where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                })->where('id', '!=', auth()->user()->id)
                    ->latest('id')
                    ->paginate(10);*/
        $users = User::whereHas('roles', function($query){
            $query->where('name', 'LIKE', 'administrador')
            ->orWhere('name', 'LIKE', 'ejecutivo')
            ->orWhere('name', 'LIKE', 'reporte')
            ->where('users.name', 'LIKE', '%' . $this->search . '%')
            ->where('users.email', 'LIKE', '%' . $this->search . '%');
        })
        ->latest('id')
        ->paginate(10);            

        return view('livewire.user-roles', compact('users'));

        /*$posts = Post::whereHas('comments', function (Builder $query) {
            $query->where('content', 'like', 'code%');
        })->get();*/
    }
}

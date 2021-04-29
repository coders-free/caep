<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{

    public function index(){
        return view('administrador.index');
    }

    public function showRegister(){
        return view('administrador.showRegister');
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->rol);

        session()->flash('flash.banner', 'El usuario se creó con éxito');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }
}

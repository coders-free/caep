<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function change(){
        return view('auth.change-password');
    }

    public function update(Request $request){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed']
        ]);


        $user = User::where('email', $request->get('email'))
                    ->where('password', $request->get('old_password'))
                    ->first();

        if ($user) {
            $user->password = bcrypt($request->get('password'));

            $user->save();

            Auth::login($user);

            return redirect('/');

        }else{
            return back()->with('status', 'Los datos brindados no coinciden con nuestros registros');
        }

    }
}

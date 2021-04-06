<?php

namespace App\Http\Controllers;

use App\Models\Aval;
use Illuminate\Http\Request;

class AvalController extends Controller
{

    public function create(){
        return view('avales.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'  => 'required',
            'rut'   => 'required'
        ]);

        $aval = auth()->user()->imponente->avales()->create([
            'name' => $request->name,
            'rut' => $request->rut
        ]);

        $aval->identificacion()->create();
        $aval->trabajo()->create();

        return redirect()->route('avales.edit', $aval);
    }

    public function edit(Aval $aval){
        return view('avales.edit', compact('aval'));
    }
}

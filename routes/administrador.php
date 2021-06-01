<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\HomeController;

use App\Http\Livewire\Administrador\Prestamos;
use App\Http\Livewire\Administrador\Users;

Route::get('/', Users::class)->name('administrador.index');

Route::get('prestamos', Prestamos::class)->name('administrador.prestamos');
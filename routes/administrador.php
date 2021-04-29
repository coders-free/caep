<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\HomeController;
use App\Http\Livewire\PrestamoComponent;

Route::get('/', [HomeController::class, 'index'])->name('administrador.index');

Route::get('prestamos', PrestamoComponent::class)->name('administrador.prestamos');
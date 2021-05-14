<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\HomeController;
use App\Http\Livewire\Administrador\PrestamoComponent;

Route::get('/', [HomeController::class, 'index'])->name('administrador.index');

Route::get('prestamos', PrestamoComponent::class)->name('administrador.prestamos');

Route::get('prueba', function () {
    $collectionA = collect([1, 2, 3, false])->diff(false);

    return $collectionA;
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SolicitudesComponent;
use App\Http\Livewire\EstatutosComponent;
use App\Http\Controllers\ImponenteController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\AvalController;

use App\Http\Livewire\AvalIndex;
use App\Models\Aval;

use App\Http\Livewire\CreditoImponente;

Route::get('/', CreditoImponente::class)->name('welcome');

Route::get('creditos', CreditoImponente::class);

Route::get('solicitudes', SolicitudesComponent::class)->name('solicitudes.index');
Route::get('solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');

Route::get('solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('solicitudes.show');

Route::get('solicitudes/{solicitud}/edit', [SolicitudController::class, 'edit'])->name('solicitudes.edit');
Route::put('solicitudes/{solicitud}', [SolicitudController::class, 'update'])->name('solicitudes.update');

//Estatutos
Route::get('estatutos', EstatutosComponent::class)->name('estatutos.index');


Route::get('imponente', [ImponenteController::class, 'index'])->name('imponente');

Route::get('avales', AvalIndex::class)/* ->middleware('avales') */->name('avales');
Route::get('avales/create', [AvalController::class, 'create'])->name('avales.create');;
Route::post('avales/store', [AvalController::class, 'store'])->name('avales.store');;
Route::get('avales/{aval}/edit', [AvalController::class, 'edit'])->name('avales.edit');

Route::get('prueba', function () {

    return Aval::find(1);

});



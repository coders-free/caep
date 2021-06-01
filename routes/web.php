<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\EstatutosComponent;
use App\Http\Controllers\ImponenteController;
use App\Http\Controllers\SolicitudController;

use App\Http\Livewire\Imponente\Creditos;
use App\Http\Livewire\Imponente\Solicitudes;

Route::get('/', Creditos::class)->name('welcome');

Route::get('solicitudes', Solicitudes::class)->name('solicitudes.index');

Route::get('solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('solicitudes.show');

Route::get('solicitudes/{solicitud}/edit', [SolicitudController::class, 'edit'])->name('solicitudes.edit');
Route::put('solicitudes/{solicitud}', [SolicitudController::class, 'update'])->name('solicitudes.update');

//Estatutos
Route::get('estatutos', EstatutosComponent::class)->name('estatutos.index');

Route::get('imponente', [ImponenteController::class, 'index'])->name('imponente');
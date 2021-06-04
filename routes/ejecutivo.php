<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Ejecutivo\Solicitudes;
use App\Http\Controllers\Ejecutivo\SolicitudController;

Route::get('/', Solicitudes::class)->name('ejecutivo.index');
Route::get('solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('ejecutivo.solicitudes.show');

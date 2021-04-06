<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjecutivoController;
use App\Http\Livewire\Ejecutivo\EjecutivoComponent;
use App\Http\Controllers\Ejecutivo\SolicitudController;
use App\Http\Livewire\SolicitudesAsignadas;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

Route::get('/', EjecutivoComponent::class)->name('ejecutivo.index');
Route::get('solicitudes/asignadas', SolicitudesAsignadas::class)->name('ejecutivo.solicitudes.asignadas');
Route::get('solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('ejecutivo.solicitudes.show');

Route::get('prueba', function () {

    /* return Solicitud::where('status', 2)->latest('id')->paginate(10)->total(); */

   

});

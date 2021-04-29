<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reportes\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('reportes.index');
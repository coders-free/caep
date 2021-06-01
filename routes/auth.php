<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PasswordController;

Route::get('change/password', [PasswordController::class, 'change'])->name('password.change');
Route::post('change/password', [PasswordController::class, 'update'])->name('password.update');
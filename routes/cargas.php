<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\HomeController;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CargaImponenteImport;


Route::get('carga/imponentes', function () {
    //$name = 'Acceso FTP/Proveedores/ma/Repositorios/' . now()->format('Ymd') . "_MACKENNA_CARGARIMPONENTES.csv";
    
    Excel::import(new CargaImponenteImport, 'Acceso FTP/Proveedores/ma/Repositorios/20210616_MACKENNA_CARGARIMPONENTES.csv', 'ftp');
    return "Carga completa";
});
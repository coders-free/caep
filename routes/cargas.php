<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\HomeController;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CargaImponenteImport;
use App\Imports\CargaCreditoImport;

use Illuminate\Support\Facades\Storage;

Route::get('carga/imponentes', function () {

    $fecha_actual = now()->format('Ymd');
    //echo $fecha_actual;
    //exit;
    //$fecha_actual = "20210610";

    //$file_imponente = '/Proveedores/ma/Repositorios/' . $fecha_actual . "_MACKENNA_CARGARIMPONENTES-CIERRE.csv";
    $file_credito = '/Proveedores/ma/Repositorios/' . $fecha_actual .'_MACKENNA_ESTADOCUENTA-CIERRE.csv';
    
    //if (Storage::disk('ftp')->exists($file_imponente)) {
    //    Excel::import(new CargaImponenteImport, $file_imponente, 'ftp');
    //}

    if (Storage::disk('ftp')->exists($file_credito)) {
        Excel::import(new CargaCreditoImport, $file_credito, 'ftp');
    }

    return "Carga completa";
});
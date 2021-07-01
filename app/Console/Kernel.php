<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CargaImponenteImport;
use App\Imports\CargaCreditoImport;

use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $fecha_actual = now()->subDay(1)->format('Ymd');

            $file_imponente = 'Acceso FTP/Proveedores/ma/Repositorios/' . $fecha_actual . "_MACKENNA_CARGARIMPONENTES.csv";
            $file_credito = 'Acceso FTP/Proveedores/ma/Repositorios/' . $fecha_actual . '_MACKENNA_ESTADOCUENTA.csv';

            if (Storage::disk('ftp')->exists($file_imponente)) {
                Excel::import(new CargaImponenteImport, $file_imponente, 'ftp');
            }
        
            if (Storage::disk('ftp')->exists($file_credito)) {
                Excel::import(new CargaCreditoImport, $file_credito, 'ftp');
            }

        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

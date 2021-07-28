<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Imports\CustomerImport;
use App\Imports\BrandImport;
use App\Imports\CodeImport;
use App\Imports\VoucherImport;
use App\Imports\VoucherVisualitationImport;
use App\Models\VoucherVisualitation;
use PhpParser\Node\Stmt\Return_;

class import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa Datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Importar
            if (Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_CATEGORIAS_' . Carbon::now()->format('Ymd') . '.csv')) {
                Excel::import(new CategoryImport, 'GENERADOS_DD/FORUM_CATEGORIAS_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
            }

            if (Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_CLIENTES_' . Carbon::now()->format('Ymd') . '.csv')) {
                Excel::import(new CustomerImport, 'GENERADOS_DD/FORUM_CLIENTES_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
            }
            
            /*if (Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_CLIENTES_CON_PERSONALIZACION_20210512' . '.csv')) {
                Excel::import(new CustomerImport, 'GENERADOS_DD/FORUM_CLIENTES_CON_PERSONALIZACION_20210512'. '.csv', 'ftp');
           // }*/


            if (Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_BENEFICIOS_VISUALIZACION_' . Carbon::now()->format('Ymd') . '.csv')) {
                VoucherVisualitation::truncate();
                Excel::import(new VoucherVisualitationImport, 'GENERADOS_DD/FORUM_BENEFICIOS_VISUALIZACION_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
            }

            if (Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_CUPON_' . Carbon::now()->format('Ymd') . '.csv')) {
                Excel::import(new BrandImport, 'GENERADOS_DD/FORUM_CUPON_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
                Excel::import(new VoucherImport, 'GENERADOS_DD/FORUM_CUPON_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
                Excel::import(new CodeImport, 'GENERADOS_DD/FORUM_CUPON_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
            }
    }
}

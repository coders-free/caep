<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\ImponentesExport;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exporta Archivos';

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
        Excel::store(new ImponentesExport, 'GeneradosSGS/EXPORT_IMPONENTES_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
    }
}

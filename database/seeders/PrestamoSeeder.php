<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PrestamoImport;
use App\Models\Prestamo;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prestamo::create([
            'name' => 'Solicitud de retiro'
        ]);

        Excel::import(new PrestamoImport, 'prestamos.csv', 'local');
    }
}

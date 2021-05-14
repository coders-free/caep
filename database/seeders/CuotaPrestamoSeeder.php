<?php

namespace Database\Seeders;

use App\Models\Prestamo;
use Illuminate\Database\Seeder;

class CuotaPrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestamos = Prestamo::all();

        foreach ($prestamos as $prestamo) {
            if($prestamo->name == 'PRESTAMO HIPOTECARIO'){
                $prestamo->cuotas()->attach(5);
            }else{
                $prestamo->cuotas()->attach([1, 2, 3, 4]);
            }
        }
    }
}

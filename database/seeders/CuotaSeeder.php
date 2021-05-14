<?php

namespace Database\Seeders;

use App\Models\Cuota;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuotas = [12, 18, 24, 36, 60];

        foreach($cuotas as $cuota){
            Cuota::create([
                'value' => $cuota
            ]);
        }
    }
}

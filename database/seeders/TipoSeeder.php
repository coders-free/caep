<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = ['Depositar', 'Cheq. electrónico o cta. vista', 'CTA. Corriente', 'CTA. Ahorro', 'CTA RUT'];


        foreach ($datos as $dato) {
            Tipo::create([
                'name' => $dato
            ]);
        }
    }
}

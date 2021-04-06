<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Envio;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = ['Retiro en santiago', 'Domicilio particular', 'Domicilio comercial', 'Agencia de'];

        foreach ($datos as $dato) {
            Envio::create([
                'name' => $dato
            ]);
        }
    }
}

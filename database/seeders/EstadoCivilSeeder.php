<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados_civiles = ['Soltero(A)', 'Casado(A)', 'Divorciado(A)', 'Viudo(A)'];

        foreach ($estados_civiles as $estado_civil) {
            EstadoCivil::create([
                'name' => $estado_civil
            ]);
        }
    }
}

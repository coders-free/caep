<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sexo::create([
            'name' => 'Femenino',
        ]);

        Sexo::create([
            'name' => 'Masculino',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Agencia;
use App\Models\User;
use Illuminate\Database\Seeder;

class EjecutivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'victor.aranaf92@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('ejecutivo');


        $user->ejecutivo()->create([
            'agencia_id' => 1
        ]);


        $user = User::create([
            'name' => 'Claudio Saavedra',
            'email' => 'claudiosaavedra@pesic.cl',
            'password' => bcrypt('12345678')
        ])->assignRole('ejecutivo');

        $user->ejecutivo()->create([
            'agencia_id' => 2
        ]);
    }
}

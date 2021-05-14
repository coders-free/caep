<?php

namespace Database\Seeders;

use App\Models\EstadoCivil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CuotaSeeder::class);
        $this->call(PrestamoSeeder::class);
        $this->call(CuotaPrestamoSeeder::class);
        $this->call(AgenciaSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(SexoSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        \App\Models\Cargo::factory(5)->create();
        $this->call(EnvioSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(EjecutivoSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(UserSeeder::class);
    }
}

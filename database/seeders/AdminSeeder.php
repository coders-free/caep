<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ])->assignRole('administrador');

        User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'reportes@reportes.com',
            'password' => bcrypt('12345678')
        ])->assignRole('reportes');
    }
}

<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendPassword;

class UsersImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row['nombre'],
                'email' => $row['correo'],
                'password' => $row['clave_web'],
            ]);


            $user->assignRole('imponente');

            $imponente = $user->imponente()->create([
                'rut' => $row['rut'],
                'fondos' => $row['fondos'],
            ]);

            $imponente->identificacion()->create();
            $imponente->trabajo()->create();
            $imponente->bancario()->create();
        }
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";",
            'input_encoding' => 'UTF-8'
        ];
    }
}

<?php

namespace App\Imports;

use App\Models\Imponente;
use App\Models\User;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CargaImponenteImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            $imponente = Imponente::where('rut', $row['rut'])->first();

            if ($row['accion'] == 'N') {

                if ($imponente) {

                    $user = $imponente->user;

                    $user->update([
                        'name' => $row['nombre'],
                    ]);

                    $imponente->update([
                        'fondos' => $row['fondos'],
                    ]);

                }else{

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

            }else{
                
                if ($imponente) {

                    $identificacion = $imponente->identificacion;
                    $trabajo = $imponente->trabajo;
                    $bancario = $imponente->bancario;
                    $user = $imponente->user;

                    $identificacion->delete();
                    $trabajo->delete();
                    $bancario->delete();
                    $user->delete();

                }
            }

            

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

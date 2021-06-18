<?php

namespace App\Imports;

use App\Models\Credito;
use App\Models\Imponente;
use App\Models\Prestamo;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CreditoImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{

    public function collection(Collection $rows)
    {

        $imponentes = Imponente::all();
        $prestamos = Prestamo::all();

        foreach($rows as $row){

            
            
            $credito = Credito::create([
                'imponente_rut' => $row['rut'],
                'prestamo_id' => $row['prestamo_id'],
                'fecha_cierre' => Carbon::createFromFormat('d/m/Y', $row['fecha_cierre']),
                'monto_prestamo' => $row['monto_prestamo'],
                'numero_cuotas' => $row['numero_cuotas'],
                'monto_cuota' => $row['monto_cuotas'],
                'fecha_vencimiento' => Carbon::createFromFormat('d/m/Y', $row['fecha_cierre']),
            ]);

            
            
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

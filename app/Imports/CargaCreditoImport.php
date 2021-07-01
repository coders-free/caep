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

class CargaCreditoImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public function collection(Collection $rows)
    {

        foreach($rows as $row){

            $prestamo = Prestamo::where('name', $row['tipo_prestamo'])->first();    
            $imponente = Imponente::where('rut', $row['rut'])->first();

            if($imponente){
                Credito::updateOrCreate([
                    'imponente_rut' => $row['rut'],
                    'prestamo_id' => $prestamo->id,
                    'fecha_vencimiento' => $row['fecha_vencimiento']
                ],[
                    'imponente_rut' => $row['rut'],
                    'prestamo_id' => $prestamo->id,
                    'fecha_cierre' => Carbon::createFromFormat('d/m/Y', $row['fecha_cierre']),
                    'monto_prestamo' => $row['monto_prestamo'],
                    'numero_cuotas' => $row['numero_cuotas'],
                    'monto_cuota' => $row['monto_cuotas'],
                    'fecha_vencimiento' => $row['fecha_vencimiento']
                ]);          
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

<?php

namespace App\Imports;

use App\Models\Credito;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

use Carbon\Carbon;

class CargaCierreImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $credito = Credito::where('imponente_rut', $row['rut'])->first();
            if ($credito) {
                $credito->saldo = $row['saldo'];
                $credito->fecha_cierre = Carbon::createFromFormat('d/m/Y', $row['fecha_cierre']);
                $credito->save();
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

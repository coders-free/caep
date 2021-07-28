<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImponentesExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table("users", "identificaciones", "trabajos", "regiones", "comunas", "sexos", "estados_civiles", "bancarios", "imponentes")
        ->select("imponentes.rut", "users.name", "users.email", "identificaciones.direccion", "regiones.name", "comunas.name", "sexos.name", "estados_civiles.name", "identificaciones.fecha_nacimiento", "identificaciones.separacion", "identificaciones.celular", "trabajos.reparticion", "trabajos.cargo", "trabajos.antiguedad", "trabajos.direccion", "regiones.name", "comunas.name", "bancarios.banco", "bancarios.numero_cuenta")
        ->where("users.id", "=", "imponentes.user_id")
        ->where("identificaciones.identificacionable_id", "=", "imponentes.rut")
        ->where("identificaciones.identificacionable_id", "=", "trabajos.trabajoable_id")
        ->where("identificaciones.identificacionable_id", "=", "bancarios.bancarioable_id")
        ->where("identificaciones.region_id", "=", "regiones.id")
        ->where("identificaciones.comuna_id", "=", "comunas.id")
        ->where("trabajos.region_id", "=", "regiones.id")
        ->where("trabajos.comuna_id", "=", "comunas.id")
        ->where("identificaciones.sexo_id", "=", "sexos.id")
        ->where("identificaciones.estado_civil_id", "=", "estados_civiles.id")
        ->get();
    }

    public function headings(): array
    {
        return [
            'RUT',
            'NOMBRE_IMPONENTE',
            'CORREO',
            'DIRECCION_PERSONAL',
            'REGION',
            'COMUNA',
            'SEXO',
            'ESTADO_CIVIL',
            'FECHA_NACIMIENTO',
            'SEPARACION',
            'CELULAR',
            'REPARTICION',
            'CARGO',
            'ANTIGUEDAD',
            'DIRECCION_TRABAJO',
            'REGION',
            'COMUNA',
            'BANCO',
            'NUMERO_CUENTA',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}

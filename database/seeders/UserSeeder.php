<?php

namespace Database\Seeders;

use App\Imports\UsersImport;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Aval;
use App\Models\Bancario;
use App\Models\Credito;
use App\Models\DetallePrestamo;
use App\Models\Identificacion;
use App\Models\Imponente;
use App\Models\Prestamo;
use App\Models\Solicitud;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Excel::import(new UsersImport, 'carga/20210526_MACKENNA_CARGARIMPONENTES.csv', 'local');


        /* User::factory(10)->create()->each(function(User $user){

            Imponente::factory(1)->create([
                'user_id' => $user->id
            ])->each(function(Imponente $imponente){


                Credito::factory(15)->create([
                    'imponente_id' => $imponente->id
                ]);

                //Avales
                Aval::factory(2)->create([
                    'avalable_id' => $imponente->id,
                    'avalable_type' => Imponente::class
                ])->each(function(Aval $aval){
                    Identificacion::factory(1)->create([
                        'identificacionable_id' => $aval->id,
                        'identificacionable_type' => Aval::class
                    ]);
    
                    Trabajo::factory(1)->create([
                        'trabajoable_id' => $aval->id,
                        'trabajoable_type' => Aval::class
                    ]);
                });

                //Identificacion
                Identificacion::factory(1)->create([
                    'identificacionable_id' => $imponente->id,
                    'identificacionable_type' => Imponente::class
                ]);

                //Trabajo
                Trabajo::factory(1)->create([
                    'trabajoable_id' => $imponente->id,
                    'trabajoable_type' => Imponente::class
                ]);

                //Bancario
                Bancario::factory(1)->create([
                    'bancarioable_id' => $imponente->id,
                    'bancarioable_type' => Imponente::class
                ]);

                //Solicitudes
                Solicitud::factory(12)->create([
                    'imponente_id' => $imponente->id,
                ])->each(function(Solicitud $solicitud){
                       
                    $hipotecario = Prestamo::where('name', 'PRESTAMO HIPOTECARIO')->first();
                    if ($solicitud->prestamo_id != 1) {
                        # code...
                    
                        if ($solicitud->prestamo_id == $hipotecario->id) {
                            $cuotas = 60;
                        } else {
                            $cuotas = 12;
                        }

                        DetallePrestamo::create([
                            'solicitud_id' => $solicitud->id,
                            'cuotas' => $cuotas,
                            'fecha_vencimiento' => $solicitud->created_at->addMonth($cuotas)
                        ]);

                        //Identificacion
                        Identificacion::factory(1)->create([
                            'identificacionable_id' => $solicitud->id,
                            'identificacionable_type' => Solicitud::class
                        ]);

                        //Trabajo
                        Trabajo::factory(1)->create([
                            'trabajoable_id' => $solicitud->id,
                            'trabajoable_type' => Solicitud::class
                        ]);

                        //Bancario
                        Bancario::factory(1)->create([
                            'bancarioable_id' => $solicitud->id,
                            'bancarioable_type' => Solicitud::class
                        ]);

                        //Avales
                        Aval::factory(1)->create([
                            'avalable_id' => $solicitud->id,
                            'avalable_type' => Solicitud::class
                        ])->each(function(Aval $aval){
                            Identificacion::factory(1)->create([
                                'identificacionable_id' => $aval->id,
                                'identificacionable_type' => Aval::class
                            ]);
            
                            Trabajo::factory(1)->create([
                                'trabajoable_id' => $aval->id,
                                'trabajoable_type' => Aval::class
                            ]);
                        });
                    
                    
                    }
                    
                });
            });

            $user->assignRole('imponente');

        }); */

        
    }
}

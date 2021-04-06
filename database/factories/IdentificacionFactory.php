<?php

namespace Database\Factories;

use App\Models\EstadoCivil;
use App\Models\Identificacion;
use App\Models\Region;
use App\Models\Sexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdentificacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Identificacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $region = Region::all()->random();

        return [
            'direccion'         => $this->faker->address,
            'region_id'         => $region->id,
            'comuna_id'         => $region->comunas->random()->id,
            'fecha_nacimiento'  => $this->faker->dateTime('1992-03-06 08:37:17', 'UTC'),
            'sexo_id'           => Sexo::all()->random()->id,
            'estado_civil_id'   => EstadoCivil::all()->random()->id,
            'separacion'        => $this->faker->boolean(),
            'celular'           => $this->faker->phoneNumber,
        ];
    }
}

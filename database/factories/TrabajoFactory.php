<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Region;
use App\Models\Trabajo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrabajoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trabajo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $region = Region::all()->random();

        return [
            'reparticion'   => $this->faker->address,
            'cargo_id'      => Cargo::all()->random()->id,
            'antiguedad'    => Carbon::createFromFormat('d/m/Y', '01/01/2015'),
            'direccion'     => $this->faker->address,
            'region_id'     => $region->id,
            'comuna_id'     => $region->comunas->random()->id,
        ];
    }
}

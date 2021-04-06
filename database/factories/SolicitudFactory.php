<?php

namespace Database\Factories;

use App\Models\Prestamo;
use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitud::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'monto' =>  $this->faker->numberBetween(1000, 10000),
            'prestamo_id' => Prestamo::where('id', "!=" , 1)->get()->random()->id,
            'status' => 2,
            'user_id' => null
        ];
    }
}

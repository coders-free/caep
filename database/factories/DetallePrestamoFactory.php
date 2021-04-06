<?php

namespace Database\Factories;

use App\Models\DetallePrestamo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetallePrestamoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetallePrestamo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $cuotas = $this->faker->randomElement([12, 18, 24, 36, 60]);

        return [
            'cuotas' => $cuotas,
            'fecha_vencimiento' => Carbon::createFromFormat('d/m/Y', '10/03/2021')->addMonth($cuotas),
        ];
    }
}

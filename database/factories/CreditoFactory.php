<?php

namespace Database\Factories;

use App\Models\Credito;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Credito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $monto_prestamo = $this->faker->numberBetween(10000, 90000);
        $numero_cuotas = $this->faker->randomElement([12, 24, 36]);
        return [
            'prestamo_id' => Prestamo::all()->random()->id,
            'fecha_cierre' => now(),
            'monto_prestamo' => $monto_prestamo,
            'numero_cuotas' => $numero_cuotas,
            'monto_cuota'   => $monto_prestamo/$numero_cuotas,
            'fecha_vencimiento' => now()->addMonth($numero_cuotas)

        ];
    }
}

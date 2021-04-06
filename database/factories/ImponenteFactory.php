<?php

namespace Database\Factories;

use App\Models\Imponente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImponenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imponente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rut' => $this->faker->numberBetween(10000000, 99999999),
            'fondos' => 100000
        ];
    }
}

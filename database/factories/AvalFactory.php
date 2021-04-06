<?php

namespace Database\Factories;

use App\Models\Aval;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aval::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'rut' => $this->faker->numberBetween(10000000, 99999999),
        ];
    }
}

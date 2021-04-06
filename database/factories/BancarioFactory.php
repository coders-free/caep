<?php

namespace Database\Factories;

use App\Models\Bancario;
use App\Models\Envio;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BancarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bancario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'envio_id' => Envio::all()->random()->id,
            'agencia' => $this->faker->sentence(),
            'tipo_id' => Tipo::all()->random()->id,
            'banco' => $this->faker->sentence(),
            'numero_cuenta' => $this->faker->bankAccountNumber
        ];
    }
}

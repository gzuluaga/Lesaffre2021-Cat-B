<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdPregunta;
use App\Models\OpcionesPregunta;

class OpcionesPreguntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpcionesPregunta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pregunta' => IdPregunta::factory(),
            'nombrePregunta' => $this->faker->text,
            'criterio' => $this->faker->boolean,
            'estado' => $this->faker->boolean,
        ];
    }
}

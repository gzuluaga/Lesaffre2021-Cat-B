<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Preguntas;

class PreguntasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Preguntas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->text,
            'calificacion' => $this->faker->word,
            'formtrivia' => $this->faker->word,
            'fecha_star' => $this->faker->dateTime(),
            'fecha_end' => $this->faker->dateTime(),
            'estado' => $this->faker->boolean,
        ];
    }
}

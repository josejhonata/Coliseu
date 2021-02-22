<?php

namespace Database\Factories;

use App\Models\Ficha_treino;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaTreinoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ficha_treino::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'equipamento'=>$this->faker->word,
            'serie'=>$this->faker->word,
            'repeticao'=>$this->faker->RandomNumber(),
            'descricao' => $this->faker->word,
        ];
    }
}

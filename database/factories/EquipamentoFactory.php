<?php

namespace Database\Factories;

use App\Models\equipamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = equipamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'descricao' => $this->faker->word,
        ];
    }
}

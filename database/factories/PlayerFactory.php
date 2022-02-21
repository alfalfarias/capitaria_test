<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ranking = Player::count() + 1;
        return [
            'nombre' => $this->faker->name(),
            'pais' => $this->faker->unique()->country(),
            'ranking' => $ranking,
        ];
    }
}

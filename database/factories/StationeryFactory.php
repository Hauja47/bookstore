<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StationeryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'material' => $this->faker->word(),
            'color' => $this->faker->colorName(),
            'origin' => $this->faker->city(),
        ];
    }
}

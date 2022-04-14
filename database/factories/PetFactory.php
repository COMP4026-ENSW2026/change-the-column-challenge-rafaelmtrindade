<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'specie' => $this->faker->word(),
            'color' => $this->faker->word(),
            'size' => $this->faker->word(),
        ];
    }
}

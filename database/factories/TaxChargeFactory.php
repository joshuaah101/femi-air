<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaxChargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(30),
            'percentage_amount' => $this->faker->numberBetween(1000, 2000),
            'flat_amount' => $this->faker->numberBetween(1000, 2000),
            'use_percentage' => $this->faker->boolean(20)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $states = get_all_states('NGA');
        $number = random_int(1, 6);
        $code = $this->faker->text[$number] . $this->faker->text[$number] . time();
        $images = ['img/logo1.webp', 'img/logo2.webp', 'img/logo3.webp', 'img/logo4.webp'];
        return [
            'country' => 'NGA',
            'state' => $this->faker->randomElement($states->pluck('postal')->toArray()),
            'code' => $code,
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->randomElement($images),
            'active' => true
        ];
    }
}

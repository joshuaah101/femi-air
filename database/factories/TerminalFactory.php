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
        $names = ['Arid', 'Afrik', 'Dana', 'United Airlines', 'Delta Airlines', 'Virgin Airlines', 'Icelandair', 'Continental Airlines', 'Air Peace', 'Aero Contract', 'Allied Air', 'Azman Air', 'Max Air'];
        $states = get_all_states('NGA');
        $number = random_int(1, 6);
        $val = $this->faker->sentence($number) . $this->faker->sentence($number) . time();
        $code = implode(explode(" ", $val));
        $images = ['img/logo1.webp', 'img/logo2.webp', 'img/logo3.webp', 'img/logo4.webp'];
        return [
            'country' => 'NGA',
            'state' => $this->faker->randomElement($states->pluck('postal')->toArray()),
            'code' => $code,
            'title' => $this->faker->randomElement($names),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->randomElement($images),
            'active' => true
        ];
    }
}

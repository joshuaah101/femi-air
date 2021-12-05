<?php

namespace Database\Factories;

use App\Models\Terminal;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentences = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $code = $sentences[random_int(0, 25)] . $sentences[random_int(0, 25)] . '-' . random_int(10, 99) . random_int(10, 99);
        $dep = Terminal::inRandomOrder()->first();
        $land = Terminal::inRandomOrder()->first();
        return [
            'flight_number' => $code,
            'outbound_terminal_id' => $dep['id'],
            'inbound_terminal_id' => $land['id'],
            'departure' => $dep['state'],
            'landing' => $land['state'],
            'departure_at' => $this->faker->dateTimeBetween('2 hours', '8 hours'),
            'amount' => $this->faker->numberBetween(10000, 35000),
            'landing_at' => $this->faker->dateTimeBetween('8 hours', '1 days'),
            'cancelled' => $this->faker->boolean(20)
        ];
    }
}

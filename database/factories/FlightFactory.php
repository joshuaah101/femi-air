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
        $number_int = random_int(1, 6);
        $number = $this->faker->text[$number_int] . (time() + time());
        $dep = Terminal::inRandomOrder()->first();
        $land = Terminal::inRandomOrder()->first();
        return [
            'flight_number' => $number,
            'outbound_terminal_id' => $dep['id'],
            'inbound_terminal_id' => $land['id'],
            'departure' => $dep['state'],
            'landing' => $land['state'],
            'departure_at' => $this->faker->dateTimeBetween('now', '2 hours'),
            'landing_at' => $this->faker->dateTimeBetween('2 hours', '4 days'),
            'cancelled' => $this->faker->boolean(20)
        ];
    }
}

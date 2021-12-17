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
     * @throws \Exception
     */
    public function definition()
    {
        $sentences = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $code = $sentences[random_int(0, 25)] . $sentences[random_int(0, 25)] . '-' . random_int(10, 99) . random_int(10, 99);
        $dep = Terminal::inRandomOrder()->first();
        $land = Terminal::inRandomOrder()->first();
        $day = $this->faker->randomElement(['hours', 'days']);
        $departure = random_int(2, 24); // randomly pick departure is within 2 hours to 24 days
        $days = $departure > 7 ? 'hours' : 'days';
        $final_departure = $this->faker->dateTimeBetween('+' . $departure . ' hours', '+' . $departure . $days);

        $landing = random_int(1, 6); // then landing should be withing 1 hour to 7 hours of the departure time
        $final_landing = $departure + $landing;
        return [
            'flight_number' => $code,
            'outbound_terminal_id' => $dep['id'],
            'inbound_terminal_id' => $land['id'],
            'departure' => $dep['state'],
            'landing' => $land['state'],
            'infant' => $this->faker->numberBetween(100, 500),
            'child' => $this->faker->numberBetween(500, 1000),
            'adult' => $this->faker->numberBetween(1000, 5000),
            'departure_at' => $final_departure,
            'landing_at' => $this->faker->dateTimeBetween($final_departure, '+' . $final_landing . $days),
            'cancelled' => $this->faker->boolean(20)
        ];
    }
}

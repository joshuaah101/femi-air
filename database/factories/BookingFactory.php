<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Terminal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vals = ['economy', 'premium', 'business', 'first'];
        $flight = Flight::inRandomOrder()->first();
        $seat = $flight->seats()->inRandomOrder()->first();
        return [
            'flight_id' => $flight->id,
            'terminal_id' => $this->faker->randomElement(Terminal::pluck('id')->toArray()),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'seat_id' => $seat ? $seat['id'] : null,
            'cabin' => $this->faker->randomElement($vals),
            'country' => 'NGA',
            'amount' => $this->faker->numberBetween(5000, 60000),
            'luggage_size' => $this->faker->numberBetween(3, 40),
            'flight_type' => $this->faker->boolean(30)
        ];
    }
}

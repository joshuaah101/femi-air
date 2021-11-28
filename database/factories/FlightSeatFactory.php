<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\FlightSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightSeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'flight_id' => $this->faker->unique()->randomElement(Flight::pluck('id')->toArray()),
            'seat_id' => $this->faker->unique()->randomElement(FlightSeat::pluck('id')->toArray())
        ];
    }
}

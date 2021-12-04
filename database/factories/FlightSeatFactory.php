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
        $sentences = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $code = $sentences[random_int(0, 25)] . $sentences[random_int(0, 25)] .$sentences[random_int(0, 25)] . $sentences[random_int(0, 25)] .random_int(10, 99) . random_int(10, 99)   . random_int(10, 99) . random_int(10, 99);
        return [
            'code' => $code
        ];
    }
}

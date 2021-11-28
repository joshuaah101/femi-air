<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $booking = Booking::with(['flight', 'flight.tax_charge'])->inRandomOrder()->first();
        $charges = (float)$booking ? $booking->flight->tax_charge()->sum('percentage_amount') : 0;
        $user = User::inRandomOrder()->first();
        return [
            'flight_id' => $this->faker->randomElement(Flight::pluck('id')->toArray()),
            'booking_id' => $booking['id'],
            'user_id' => $user['id'],
            'reference' => time() + random_int(1, 203000),
            'amount' => $booking->flight->amount + $charges,
            'currency' => 'NGN',
            'country' => 'NGA',
            'name' => $user['first_name'] . ' ' . $user['last_name'],
            'email' => $user['email'],
            'payment_gateway' => 'paystack',
            'payment_successful' => $this->faker->boolean
        ];
    }
}

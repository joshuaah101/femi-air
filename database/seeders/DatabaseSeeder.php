<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Cabin;
use App\Models\Flight;
use App\Models\FlightSeat;
use App\Models\FlightTaxCharge;
use App\Models\Payment;
use App\Models\TaxCharge;
use App\Models\Terminal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (User::count() < 1) User::factory()->count(30)->create();
        if (Terminal::count() < 1) Terminal::factory()->count(30)->create(); // Dana, Arid, Afrik etc
        if (TaxCharge::count() < 1) TaxCharge::factory()->count(10)->create(); // taxes imposed on flights by country or terminal
        if (Cabin::count() < 1) {
            $cabins = ['Economy', 'Premium', 'Business', 'First'];
            foreach ($cabins as $cabin) {
                Cabin::create([
                    'title' => $cabin,
                    'slug' => Str::slug($cabin)
                ]);
            }
        }
        // each flight has its own charges and number of cabins for each of the cabin and different cost for each cabin type e.g economic is has a flat fee but first class has its own extra charge
        if (Flight::count() < 1) {
            Flight::factory()->count(200)->has(TaxCharge::factory()->count(3), 'tax_charge')->create()->each(function ($flight) {
                $cabins = Cabin::all();
                // for each flight
                foreach ($cabins as $cabin) {
                    switch ($cabin['slug']) {
                        case 'economy':
                            $amount = random_int(1000, 10000);
                            break;
                        case 'business':
                            $amount = random_int(10000, 50000);
                            break;
                        case 'premium':
                            $amount = random_int(50000, 100000);
                            break;
                        default:
                            $amount = random_int(100000, 300000); //first class
                            break;
                    }
//                    $amount = $cabin['slug'] === 'economy' ? random_int(1000, 10000) : random_int(10000, 1000000);
                    // attach each cabin type created
                    $flight->cabin()->attach($cabin, ['amount' => $amount, 'currency' => 'NGN']);
                    $rand = random_int(6, 10);
                    // add add flight seats to the flight
                    FlightSeat::factory()->count($rand)->create(['cabin_id' => $cabin['id'], 'flight_id' => $flight['id']]);
                }
            });
        }
        // Bookings and payments base on the flights
        if (Booking::count() < 1) Booking::factory()->count(20)->create();
        if (Payment::count() < 1) Payment::factory()->count(20)->create();

    }
}

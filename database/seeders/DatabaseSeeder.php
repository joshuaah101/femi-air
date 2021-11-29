<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\FlightSeat;
use App\Models\FlightTaxCharge;
use App\Models\Payment;
use App\Models\TaxCharge;
use App\Models\Terminal;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        if (Terminal::count() < 1) Terminal::factory()->count(30)->create();
        if (TaxCharge::count() < 1) TaxCharge::factory()->count(10)->create();
        if (Flight::count() < 1) Flight::factory()->count(30)->has(TaxCharge::factory()->count(4), 'tax_charge')->has(FlightSeat::factory()->count(30), 'seats')->create();
        if (FlightTaxCharge::count() < 1) FlightTaxCharge::factory()->count(20)->create();
        if (Booking::count() < 1) Booking::factory()->count(20)->create();
        if (Payment::count() < 1) Payment::factory()->count(20)->create();

    }
}

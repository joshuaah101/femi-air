<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\FlightSeat;
use App\Models\FlightTaxCharge;
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
        User::factory()->count(30)->create();
        Terminal::factory()->count(30)->create();
        TaxCharge::factory()->count(10)->create();
        Flight::factory()->count(30)->forTaxCharge(4)->has(FlightSeat::factory()->count(30))->create();
        FlightTaxCharge::factory()->count(20)->create();


    }
}

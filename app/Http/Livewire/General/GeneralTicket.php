<?php

namespace App\Http\Livewire\General;

use App\Models\Flight;
use Livewire\Component;

class GeneralTicket extends Component
{
    public $ticketType;//age_type
    public $trip_type = 0; //flight_type
    public $noOfTicket; // create multiple bookings
    public $stateFrom; // flight departure column
    public $stateTo; // flight landing column
    public $departureDate; // flight departure_at
    public $returningDate; // flight landing_at


    protected $queryString = [
        'ticketType' => ['except' => ''],
        'trip_type' => ['except' => ''],
        'noOfTicket' => ['except' => ''],
        'stateFrom' => ['except' => ''],
        'stateTo' => ['except' => ''],
        'departureDate' => ['except' => ''],
        'returningDate' => ['except' => ''],
    ];

    public function render()
    {

        $noOfTicket = (int)$this->noOfTicket;
        $count_seats = function ($query) {
            $query->count();
        };

        $flights = Flight::with(['seats' => $count_seats])->where('departure', 'LIKE', $this->stateFrom)->whereDay('departure_at', '>', Carbon::create($this->departureDate))->get();

        return view('livewire.general.general-ticket')->with(['flights' => $flights]);
    }
}
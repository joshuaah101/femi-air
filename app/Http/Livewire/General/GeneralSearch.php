<?php

namespace App\Http\Livewire\General;

use Carbon\Carbon;
use Livewire\Component;

class GeneralSearch extends Component
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

    public function bookTicket()
    {
        $this->validate([
            'ticketType' => 'required',
            'trip_type' => 'required',
            'stateFrom' => 'required',
            'stateTo' => 'required|different:stateFrom',
            'departureDate' => 'required|after:' . Carbon::now()->format('H:i:s'),
            'returningDate' => 'nullable|after:departureDate'
        ]);
        $data = 'ticketType=' . $this->ticketType .
            '&trip_type=' . $this->trip_type .
            '&$noOfTicket=' . $this->noOfTicket .
            '&stateFrom=' . $this->stateFrom .
            '&stateTo=' . $this->stateTo .
            '&departureDate=' . $this->departureDate .
            '&returningDate=' . $this->returningDate;

        $this->redirect('ticket?' . $data);
    }

    public function render()
    {

        $states = get_all_states('NGA');

        return view('livewire.general.general-search')->with(['states' => $states]);
    }
}

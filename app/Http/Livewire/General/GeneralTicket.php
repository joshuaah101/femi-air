<?php

namespace App\Http\Livewire\General;

use App\Models\Cabin;
use App\Models\Flight;
use App\Models\FlightSeat;
use Carbon\Carbon;
use Livewire\Component;

class GeneralTicket extends Component
{
    public $current_step; //flight, ticket, summary, payment
    public $gender;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $email;
    public $phone;
    public $state;
    /*************************************/

    public $ticketType;//age_type
    public $trip_type = 0; //flight_type
    public $noOfTicket; // create multiple bookings
    public $stateFrom; // flight departure column
    public $stateTo; // flight landing column
    public $departureDate; // flight departure_at
    public $returningDate; // flight landing_at
    /*****************************************/
    public $new_booking;

    protected $queryString = [
        'ticketType' => ['except' => ''],
        'trip_type' => ['except' => ''],
        'noOfTicket' => ['except' => ''],
        'stateFrom' => ['except' => ''],
        'stateTo' => ['except' => ''],
        'departureDate' => ['except' => ''],
        'returningDate' => ['except' => ''],
    ];

    public function mount()
    {
        $this->check_current_step();
    }

    public function check_current_step()
    {
        $this->current_step = "flight";
    }

    public function purchaseCabinSeat($flight_id, $cabin_id)
    {
        // cabin flight seat and user ......... what is the relationship?

        // get empty cabin space
        $this->new_booking = FlightSeat::with('booking')->where('flight_id', $flight_id)->where('cabin_id', $cabin_id)->whereDoesntHave('booking')->first();
        $this->current_step = 'ticket';
        // redirect to the next step of register profile

        // confirm payment and then store payment information with booking


    }

    public function moveTo($name)
    {
        if ($this->current_step != $name) {
            $this->current_step = $name;
        }
    }

    public function render()
    {
        $noOfTicket = (int)$this->noOfTicket;
        $count_seats = function ($query) {
            $query->count();
        };
        $states = get_all_states('NGA');

        $flights = Flight::with(['seats' => $count_seats, 'outbound_terminal', 'inbound_terminal', 'cabin', 'cabin.seats'])->where('departure', 'LIKE', '%' . $this->stateFrom . '%')->whereDate('departure_at', '>=', Carbon::create($this->departureDate))->get();
        return view('livewire.general.general-ticket')->with(['flights' => $flights, 'states' => $states]);
    }
}

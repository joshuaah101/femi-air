<?php

namespace App\Http\Livewire\General;

use App\Models\Booking;
use App\Models\Cabin;
use App\Models\Flight;
use App\Models\FlightCabin;
use App\Models\FlightSeat;
use App\Models\TempBooking;
use Carbon\Carbon;
use Livewire\Component;

class GeneralTicket extends Component
{
    public $prev_session_name = 'prev_session';
    public $current_step; //flight, ticket, summary, payment
    public $hidden_step = 0;
    public $passengers;
    public $email;
    public $phone;
    public $state_of_origin;
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
    public $ticket_fee;
    public $ticket_fee_currency;
    public $taxes = [];
    public $sub_total = 0;
    public $total = 0;

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

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Exception
     */
    public function check_current_step()
    {
        if (auth()->check()) {
            if (cache()->has($this->prev_session_name)) {
                $this->payForBooking();
            }
        } else {
            if (cache()->has($this->prev_session_name)) {
                $this->clear_prev_cache();
                return $this->current_step = null;
            }
            $this->current_step = 1;
            $this->hidden_step = 1;
        }

    }

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
        $this->current_step = 1;
        $this->hidden_step = 1;

    }

    public function purchaseCabinSeat($flight_id, $cabin_id)
    {
        // get empty seats space and check if space will be enough for passengers
        $check = FlightSeat::with('booking')->where('flight_id', $flight_id)->where('cabin_id', $cabin_id)->whereDoesntHave('booking');
        if ($check->count() > $this->noOfTicket) {
            $this->new_booking = $check->first();
            $this->get_ticket_fee($flight_id, $cabin_id);
            $this->get_flight_tax($flight_id);
            $this->calculate_total($flight_id);
            // redirect to the next step of register profile;
            $this->current_step = 2;
            $this->hidden_step = 2;
        } else {
            if ($this->noOfTicket > 1) {
                $msg = 'Flight Does not have enough space for all passengers anymore';
            } else {
                $msg = 'Sorry, Flight is fully Booked now';
            }
            $this->emit('alert', ['message' => $msg, 'type' => 'error']);
        }
    }

    public function submitProfile()
    {
        $this->validate([
            'passengers.*.first_name' => 'required',
            'passengers.*.last_name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $this->current_step = 3;
        $this->hidden_step = 3;
    }

    private function calculate_total($flight_id)
    {
        $taxes = $this->taxes;
        $sum_taxes = 0;
        foreach ($taxes as $item) {
            if ((int)$item['use_percentage'] === 1) {
                $sum_taxes += $this->ticket_fee * ((float)$item['percentage_amount'] / 100);
            } else {
                $sum_taxes += (float)$item['flat_amount'];
            }
        }
        $sub_total = $sum_taxes + $this->ticket_fee;
        $this->sub_total = $sub_total;
        $this->total = $sub_total * (int)$this->noOfTicket;

    }

    private function get_ticket_fee($flight_id, $cabin_id)
    {
        $relationship = FlightCabin::where('flight_id', $flight_id)->where('cabin_id', $cabin_id)->first();
        if ($relationship) {
            $this->ticket_fee = $relationship['amount'];
            $this->ticket_fee_currency = $relationship['currency'];
        }
    }

    private function get_flight_tax($flight_id)
    {
        $flight = Flight::with('tax_charge')->where('id', $flight_id)->first();
        if ($flight) {
            $this->taxes = $flight->tax_charge;
        }
    }

    public function moveTo($id)
    {
        // you can only visit previous pages but can't go to pages you haven't filled
        if ($this->current_step != $id && $this->hidden_step >= $id) {
            $this->current_step = $id;
        }
    }

    /**
     * @throws \Exception
     */
    public function payForBooking()
    {
        // check if user is logged in
        if (auth()->check()) {
            if (cache()->has($this->prev_session_name)) {
                $prev_session = cache()->get($this->prev_session_name);
                $prev_data = TempBooking::where('session_id', cache()->get($this->prev_session_name));
                if ($prev_data->count() > 0) {
                    $get_data = $prev_data->first()['data'];
                    $this->new_booking = $get_data['booking'];
                    $this->email = $get_data['email'];
                    $this->phone = $get_data['phone'];
                    $this->passengers = $get_data['passengers'];
                    $this->state_of_origin = $get_data['state_of_origin'];
                    $this->ticket_fee = $get_data['ticket_fee'];
                    $this->ticket_fee_currency = $get_data['ticket_fee_currency'];
                    $this->taxes = $get_data['taxes'];
                    $this->sub_total = $get_data['sub_total'];
                    $this->total = $get_data['total'];
                    /******************************/
                    if (isset($get_data['ticketType'])) $this->ticketType = $get_data['ticketType'];
                    if (isset($get_data['trip_type'])) $this->trip_type = $get_data['trip_type'];
                    if (isset($get_data['noOfTicket'])) $this->noOfTicket = $get_data['noOfTicket'];
                    if (isset($get_data['stateFrom'])) $this->stateFrom = $get_data['stateFrom'];
                    if (isset($get_data['stateTo'])) $this->stateTo = $get_data['stateTo'];
                    if (isset($get_data['departureDate'])) $this->departureDate = $get_data['departureDate'];
                    if (isset($get_data['returningDate'])) $this->returningDate = $get_data['returningDate'];
                } else {
                    if ($this->new_booking) {

                    } else {
                        session()->flash('error', 'Unable to fetch Previous Booking');
                        return redirect(url('/'));
                    }

                }
                $this->current_step = 4;
                $this->hidden_step = 4;
            }
        } else {
            // save all transaction into temporal file and register/login user before going to payment gateway

            $session = session_id();
            TempBooking::create([
                'session_id' => $session,
                'data' => ['booking' => $this->new_booking, 'passengers' => $this->passengers, 'email' => $this->email, 'phone' => $this->phone,
                    'state_of_origin' => $this->state_of_origin,
                    'ticket_fee' => $this->ticket_fee,
                    'ticket_fee_currency' => $this->ticket_fee_currency,
                    'taxes' => $this->taxes,
                    'sub_total' => $this->sub_total,
                    'total' => $this->total,
                    'ticket_query' => [
                        "ticketType" => $this->ticketType,
                        "trip_type" => $this->trip_type,
                        "noOfTicket" => $this->noOfTicket,
                        "stateFrom" => $this->stateFrom,
                        "stateTo" => $this->stateTo,
                        "departureDate" => $this->departureDate,
                        "returningDate" => $this->returningDate]
                ]
            ]);
            //store prev session in cache before redirecting to login page
            cache()->add($this->prev_session_name, $session);

            session()->flash('error', 'Login Required');
            return redirect('login');
        }

    }

    public function render()
    {
        $count_seats = function ($query) {
            $query->count();
        };
        $states = get_all_states('NGA');

        if ($this->stateFrom) {
            $flights = Flight::with(['seats' => $count_seats, 'outbound_terminal', 'inbound_terminal', 'cabin', 'cabin.seats'])->where('departure', 'LIKE', '%' . $this->stateFrom . '%')->whereDate('departure_at', '>=', Carbon::create($this->departureDate))->get();
        } else {
            $flights = [];
        }


        return view('livewire.general.general-ticket')->with(['flights' => $flights, 'states' => $states]);
    }

    private function clear_prev_cache()
    {
        $id = cache()->get($this->prev_session_name);
        $check = TempBooking::where('session_id', $id);
        if ($check->count() > 0) {
            $check->delete();
            cache()->delete($this->prev_session_name);
        }
    }
}

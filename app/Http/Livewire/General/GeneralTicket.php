<?php

namespace App\Http\Livewire\General;

use App\Models\Booking;
use App\Models\Cabin;
use App\Models\Flight;
use App\Models\FlightCabin;
use App\Models\FlightSeat;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\TempBooking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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

    protected $listeners = ['paymentConfirmed'];


    public function paymentConfirmed($new_data)
    {
        $data = collect($new_data);
        $state = $this->state_of_origin;
        $payment_units = $data['purchase_units'][0];
        $payer = $data['payer'];

        if (isset($data['id'])) $reference = $data['id'];
        if (isset($payer['name']['given_name'], $payer['name']['surname'])) {
            $name = $payer['name']['given_name'] . ' ' . $payer['name']['surname'];
        } else {
            $name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        }
        if (isset($payer['email_address'])) {
            $email = $payer['email_address'];
        } else {
            $email = auth()->user()->email;
        }
        if (isset($payer['address']['country_code'])) $country = $payer['address']['country_code'];
        $amount = $payment_units['amount']['value'] ?? $this->total;
        if (isset($payment_units['amount']['currency_code'])) {
            $currency = $payment_units['amount']['currency_code'];
        } else {
            $currency = $this->ticket_fee_currency;
        }
        if (isset($payment_units['payments']['captures'])) {
            $payments = $payment_units['payments']['captures'];
        }
        if (isset($payments[0]['final_capture'])) $status = $payments[0]['final_capture'];

        $check = Booking::where('user_id', auth()->id())->where('flight_id', $this->new_booking['flight_id'])->where('cabin_id', $this->new_booking['cabin_id'])->whereDate('created_at', '>=', now()->addHours(2)); // booking done 2 hours ago
        if ($check->count() > 0) {
            $booking = $check->first();
        } else {
            $booking = new Booking();
        }

        if (isset($this->new_booking['flight'])) $booking->terminal_id = $this->new_booking['flight']['outbound_terminal_id'];

        if (isset($this->new_booking['flight_id'])) $booking->flight_id = $this->new_booking['flight_id'];

        $booking->user_id = auth()->id();
        if (isset($this->new_booking['cabin_id'])) $booking->cabin_id = $this->new_booking['cabin_id'];
        if (isset($country)) $booking->country = $country;
        if (isset($state)) $booking->state = $state;
        if (isset($amount)) $booking->amount = $amount;
        if (isset($this->new_booking['flight_type'])) $booking->flight_type = $this->new_booking['flight_type'];
        if (isset($email)) $booking->email = $email;
        $booking->phone = auth()->user()->phone;
        if (isset($this->new_booking['state'])) $booking->state = $this->new_booking['state'];

        $booking->save();

        $new_payment = new Payment();
        $new_payment->user_id = auth()->id();
        $new_payment->booking_id = $booking['id'];
        if (isset($payments[0])) $new_payment->invoice_no = $payments[0]['id'];
        if (isset($reference)) $new_payment->reference = $reference;
        if (isset($name)) $new_payment->name = $name;
        if (isset($email)) $new_payment->email = $email;
        if (isset($country)) $new_payment->country = $country;
        if (isset($amount)) $new_payment->amount = $amount;
        if (isset($currency)) $new_payment->currency = $currency;
        if (isset($status)) $new_payment->payment_successful = $status;
        if (isset($this->new_booking['flight_id'])) $new_payment->flight_id = $this->new_booking['flight_id'];

        $new_payment->payment_gateway = 'paypal';
        $new_payment->save();
        foreach ($this->passengers as $person) {
            $flight_id = $this->new_booking['flight_id'];
            $cabin_id = $this->new_booking['cabin_id'];
            $seat = $this->get_free_seats($flight_id, $cabin_id)->first();
            Passenger::create([
                'booking_id' => $booking['id'],
                'payment_id' => $new_payment['id'],
                'flight_seat_id' => ($seat) ? $seat['id'] : null,
                'cabin_id' => $cabin_id,
                'flight_id' => $flight_id,
                'gender' => $person['gender'],
                'first_name' => $person['first_name'],
                'last_name' => $person['last_name'],
                'date_of_birth' => $person['date_of_birth']
            ]);
        }
        $this->clear_prev_cache();
        return redirect(url('user/active'));
    }

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
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
            } else {
                $this->current_step = 1;
                $this->hidden_step = 1;
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

    public function get_free_seats($flight_id, $cabin_id)
    {
        return FlightSeat::with('passenger')->where('flight_id', $flight_id)->where('cabin_id', $cabin_id);
    }

    public function purchaseCabinSeat($flight_id, $cabin_id)
    {
        // get empty seats space and check if space will be enough for passengers
        $check = $this->get_free_seats($flight_id, $cabin_id);
//        $cabin = Cabin::with(['flight' => function ($query) use ($flight_id) {
//            $query->where('flight_id', $flight_id);
//        }])->where('id', $cabin_id)->first();
        $cabin = FlightCabin::with(['flight', 'cabin'])->where('flight_id', $flight_id)->where('cabin_id', $cabin_id)->first();
        if ($check->count() > $this->noOfTicket) {
            $this->new_booking = $cabin;
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
                $prev_data = TempBooking::where('session_id', $prev_session);
                if ($prev_data->count() > 0) {
                    $get_data = $prev_data->first()['data'];
                    $booking = $this->get_free_seats($get_data['booking']['flight_id'], $get_data['booking']['cabin_id'])->first();
                    $this->new_booking = $booking;
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

                    $this->current_step = 4;
                    $this->hidden_step = 4;
                } else {
                    if (!$this->new_booking) {
                        session()->flash('error', 'Unable to fetch Previous Booking');
                        return redirect(url('/'));
                    }
                }
            }
            $this->current_step = 4;
            $this->hidden_step = 4;
        } else {
            // save all transaction into temporal file and register/login user before going to payment gateway
            $session = session_id();
            TempBooking::create([
                'session_id' => $session,
                'data' => [
                    'booking' => $this->new_booking, 'passengers' => $this->passengers, 'email' => $this->email, 'phone' => $this->phone,
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
//            cache()->add($this->prev_session_name, $session);

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

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Exception
     */
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

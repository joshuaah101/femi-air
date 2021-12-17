<?php

namespace App\Http\Livewire\Search;

use App\Models\Booking;
use Livewire\Component;

class SearchBooking extends Component
{
    public $credentials;
    public $search;
    public $ticketType;
    protected $queryString = ['search' => ['except' => '']];


    public function search_booking()
    {
        $booking = Booking::with(['flight', 'payment', 'terminal', 'passengers', 'cabin']);
        $id = $this->search;
        if ($this->search)
            if (auth()->check()) {
                $user_id = auth()->id();
                $this->credentials = $booking->where('id', $id)->where('user_id', $user_id)->first();

            } else {
                $this->credentials = $booking->where('id', $id)->first();
            }
    }


    public function render()
    {
        $this->search_booking();
        return view('livewire.search.search-booking');
    }
}

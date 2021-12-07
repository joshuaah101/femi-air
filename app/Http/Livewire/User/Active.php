<?php

namespace App\Http\Livewire\User;

use App\Models\Payment;
use Livewire\Component;

class Active extends Component
{

    protected $listeners = [
        'deleteActive'
    ];

    public function deleteActive($id)
    {
        Payment::with(['booking', 'passengers'])->where('id', $id)->delete();
        $this->emit('alert', ['message' => 'History Deleted Successfully', 'type' => 'success']);
    }

    public function render()
    {
        $search = function ($query) {
            $query->whereDate('departure_at', '>', now());
        };
        $bookings = Payment::with(['flight' => $search, 'booking', 'booking.passengers'])->where('user_id', auth()->id())->simplePaginate(9);
        return view('livewire.user.active')->with(['bookings' => $bookings]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * @package App\Models
 * @property int flight_id
 * @property int terminal_id
 * @property int user_id
 * @property int seat_id
 * @property mixed country
 * @property mixed cabin
 * @property mixed age_type
 * @property mixed amount
 * @property boolean flight_type
 */
class Booking extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id', 'id');
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seat()
    {
        return $this->belongsTo(FlightSeat::class, 'seat_id', 'id');
    }
}

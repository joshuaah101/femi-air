<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Passenger
 * @package App\Models
 * @property int booking_id
 * @property int flight_seat_id
 * @property int cabin_id
 * @property int flight_id
 * @property mixed gender
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed date_of_birth
 */
class Passenger extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function seat()
    {
        return $this->belongsTo(FlightSeat::class, 'flight_seat_id', 'id');
    }

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }
}

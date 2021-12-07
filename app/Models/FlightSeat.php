<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FlightSeat
 * @package App\Models
 * @property int id
 * @property int flight_id
 * @property int cabin_id
 * @property boolean is_booked
 */
class FlightSeat extends Model
{
    use HasFactory;

    protected $appends = ['is_booked'];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    /**
     * Use this to check if the seat is booked for the current flight
     * @return mixed
     */
    public function getIsBookedAttribute()
    {
        return $this->passenger !== null;
    }


    public function passenger()
    {
        return $this->hasOne(Passenger::class, 'flight_seat_id', 'id');
    }

    /**
     * Every Seat must have or belong to a cabin
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }
}

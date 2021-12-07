<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FlightCabin
 * @package App\Models
 * @property int flight_id
 * @property int cabin_id
 * @property mixed amount
 * @property mixed currency
 */
class FlightCabin extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }

    public function cabin_seats()
    {
        return $this->hasManyThrough(FlightSeat::class, Cabin::class, 'cabin_id', 'seat_id', 'id', 'seat_id');
    }
}

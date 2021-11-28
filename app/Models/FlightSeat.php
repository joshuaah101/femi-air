<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FlightSeat
 * @package App\Models
 * @property int id
 * @property int flight_id
 * @property int seat_id
 */
class FlightSeat extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }
}

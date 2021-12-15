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
 * @property string session_id
 * @property mixed cabin_id
 * @property mixed country
 * @property mixed amount
 * @property mixed email
 * @property mixed phone
 * @property mixed state
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

    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }

}

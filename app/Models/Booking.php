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
 * @property int country
 * @property int amount
 * @property int flight_type
 */
class Booking extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

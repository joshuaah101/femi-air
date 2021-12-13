<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flight
 * @package App\Models
 * @property int id
 * @property int terminal_id
 * @property int flight_number
 * @property mixed outbound_terminal_id
 * @property mixed inbound_terminal_id
 * @property mixed departure
 * @property mixed landing
 * @property mixed child
 * @property mixed infant
 * @property mixed adult
 * @property mixed departure_at
 * @property mixed landing_at
 * @property boolean cancelled
 * @property boolean has_landed
 */
class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'departure_at' => 'datetime',
        'landing_at' => 'datetime',
        'cancelled' => 'boolean',
        'has_landed' => 'boolean'
    ];

    protected $appends = ['return_date'];

    public function getReturnDateAttribute()
    {
        // when a flight is given, use the flight to check the return date
        if ($this->departure && $this->landing) {
            if ($this->departure_at) {
                return self::where('departure', $this->landing)->where('landing', $this->departure)->whereDate('departure_at', $this->landing_at)->get();
            }
        }
        return null;
    }

    public function outbound_terminal()
    {
        return $this->belongsTo(Terminal::class, 'outbound_terminal_id', 'id');
    }

    public function inbound_terminal()
    {
        return $this->belongsTo(Terminal::class, 'inbound_terminal_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'flight_id', 'id');
    }

    public function tax_charge()
    {
        return $this->belongsToMany(TaxCharge::class, FlightTaxCharge::class, 'flight_id', 'tax_charge_id');
    }

    public function cabin()
    {
        return $this->belongsToMany(Cabin::class, FlightCabin::class, 'flight_id', 'cabin_id')->withPivot(['amount', 'currency']);
    }

    public function seats()
    {
        return $this->hasMany(FlightSeat::class, 'flight_id', 'id');
    }

    public function pivot_seats()
    {
        return $this->hasManyThrough(
            FlightSeat::class, // The model to access to
            FlightCabin::class, // The intermediate table that connects the Flight with the Cabin.
            'flight_id',// The column of the intermediate table that connects to this model by its ID.
            'cabin_id',// The column of the intermediate table that connects the Cabin by its ID.
            'id',// The column that connects this model with the intermediate model table.
            'cabin_id' // The column of the Seats table that ties it to the Cabin.
        );
    }

}

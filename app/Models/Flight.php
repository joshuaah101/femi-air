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
 * @property mixed departure_at
 * @property mixed landing_at
 * @property boolean cancelled
 */
class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function outbound_terminal()
    {
        return $this->belongsTo(Terminal::class, 'outbound_terminal_id', 'id');
    }

    public function inbound_terminal()
    {
        return $this->belongsTo(Terminal::class, 'inbound_terminal_id', 'id');
    }

    public function tax_charge()
    {
        return $this->belongsToMany(TaxCharge::class, FlightTaxCharge::class);
    }

    public function seats()
    {
        return $this->hasMany(FlightSeat::class,'flight_id','id');
    }
}

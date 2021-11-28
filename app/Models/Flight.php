<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flight
 * @package App\Models
 * @property int terminal_id
 * @property int flight_number
 * @property mixed outbound_code
 * @property mixed inbound_code
 * @property mixed cabin
 * @property mixed departure
 * @property mixed landing
 * @property boolean cancelled
 */
class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @property int id
 * @property int flight_id
 * @property int booking_id
 * @property int user_id
 * @property mixed reference
 * @property mixed amount
 * @property mixed currency
 * @property mixed country
 * @property mixed name
 * @property mixed email
 * @property mixed payment_gateway
 * @property mixed payment_successful
 */
class Payment extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }

}

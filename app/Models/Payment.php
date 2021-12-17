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
 * @property string session_id
 * @property mixed invoice_no
 * @property mixed reference
 * @property mixed amount
 * @property mixed currency
 * @property mixed country
 * @property mixed name
 * @property mixed email
 * @property mixed payment_gateway
 * @property mixed payment_successful
 * @property mixed breakdown
 */
class Payment extends Model
{
    use HasFactory;

    protected $casts = ['breakdown' => 'json'];

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

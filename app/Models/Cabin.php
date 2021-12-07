<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->belongsToMany(Flight::class, FlightCabin::class)->withPivot(['amount', 'currency']);
    }

    public function seats()
    {
        return $this->hasMany(FlightSeat::class, 'cabin_id', 'id');
    }
}

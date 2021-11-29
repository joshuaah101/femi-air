<?php

namespace App\Models;

use Database\Factories\TaxChargeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightTaxCharge extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return TaxChargeFactory::new();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Terminal
 * @package App\Models
 * @property mixed title
 * @property mixed country
 * @property mixed state
 * @property mixed description
 * @property mixed code
 * @property mixed image
 * @property boolean active
 */
class Terminal extends Model
{
    use HasFactory;

    protected $guarded = [];

}

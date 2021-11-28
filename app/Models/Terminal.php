<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Terminal
 * @package App\Models
 * @property mixed title
 * @property mixed code
 * @property boolean active
 */
class Terminal extends Model
{
    use HasFactory;

    protected $guarded = [];

}

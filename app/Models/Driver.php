<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'driver_name',
        'driver_id',
        'driver_phone',
        'car_bord_number'
    ];
}

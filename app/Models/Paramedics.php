<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramedics extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'firstname',
        'father_name',
        'grand_name',
        'lastname',
        'phone',
        'email',
        'BD_Day',
        'BD_Month',
        'BD_Year',
        'IDnumber',
        'username',
        'password',
        'paramedic_state'
    ];
}

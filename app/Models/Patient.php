<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'firstname',
        'lastname',
        'birthDate',
        'gender',
        'phone',
        'length',
        'weight',
        'deaf',
    ];
}

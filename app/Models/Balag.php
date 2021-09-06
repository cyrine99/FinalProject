<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balag extends Model
{
    use HasFactory;
    protected $fillable=['id',
        'id_patient',
        'location_latitude',
        'location_longitude',
        'phone',
        'for_you',
        'balag_type',
        'location_description',
        'number_of_persons',
        'balag_state',
        'name',
        'age',
        'notes',
        'gender'];

}

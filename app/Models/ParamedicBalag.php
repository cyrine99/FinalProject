<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamedicBalag extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'balag_id',
        'paramedic_id',
        'balag_state',
        'time_deny_task',
        'reasons_for_rejection',
        'notes_reasons_for_rejection',
        'time_accept_task',
        'time_access_location',
        'relief_details',
        'hospital',
        'hospital_name',
        'other_details'
    ];



}

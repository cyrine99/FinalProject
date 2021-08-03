<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExitPermissionRequert extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'patient_id',
        'state_details',
        'driver_name',
        'driver_id',
        'driver_phone',
        'car_bord_number',
        'home_address',
        'hospital_name',
        'date_time_request',
        'request_state'
    ];

    //دالة لتحديد العلاقة بين المريض و طلب التصريح
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}

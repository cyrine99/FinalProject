<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginPatient extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'patient_id',
        'tokens',
    ];

    //دالة لتحديد العلاقة بين المريض و لاجهزة المسجل فيها حسابه
    public function patientsLogin()
    {
        return $this->belongsTo(Patient::class);
    }

}

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
        'token',
    ];

    //دالة لتحديد العلاقة بين المريض و طلب التصريح
    public function exitPermissionRequest()
    {
        return $this->hasMany(ExitPermissionRequert::class);
    }

    //دالة لتحديد العلاقة بين المريض و لاجهزة المسجل فيها حسابه
    public function loginPatientTokens ()
    {
        return $this->hasMany(LoginPatient::class);
    }
}

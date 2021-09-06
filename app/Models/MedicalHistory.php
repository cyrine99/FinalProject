<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'id_patient',
        'blood_type',
        'diabetes',
        'heart_disease',
        'blood_pressure_disease',
        'medicines_allergic',
        'medicines_used',
        'other_diseases_details',
        'health_insurance',
        'insurance_company_name',
        'insurance_expiry_date',
        'insurance_membership_No'];
}

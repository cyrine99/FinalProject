<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{


    use HasFactory;
    protected $fillable=[
        'id',
      'firstname',
        'lastname',
        'employeeId',
        'email',
        'userType',
        'password',
        'admin_state'
    ];


}

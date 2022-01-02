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
        'birth_date',
        'IDnumber',
        'username',
        'password',
        'paramedic_state'
    ];


    public function paramedicBalag()
    {
        return $this->hasMany(ParamedicBalag::class);
    }

}

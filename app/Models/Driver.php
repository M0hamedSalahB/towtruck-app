<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phonenumber',
        'distancetraveld',
        'moneymade',
        'ssn',
        'licenseplatenumber',
    ];




    protected $hidden = [
        'password',
        'remember_token',
    ];







    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_number_verified_at'=>'datetime',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $filltable = 'assignments';

    protected $fillable = ['appointment_date',	'appointment_start_time','appointment_end_time','description'];
}

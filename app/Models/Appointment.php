<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $filltable = 'assignments';

    protected $fillable = ['appointment_date',	'appointment_start_time','appointment_end_time','description'];

    // public function clientAppointments(): HasMany
    // {
    //     return $this->hasMany(ClientController::class, 'client_id','client_id');
    // }

    // public function doctorAppointments(): HasMany
    // {
    //     return $this->hasMany(DoctorController::class, 'doctor_id','doctor_id');
    // }

    public function doctorAppointments(): HasOne
    {
        return $this->hasOne(Doctor::class,'doctor_id', 'doctor_id');
    }

    public function clientAppointments(): HasOne
    {
        return $this->hasOne(Client::class,'client_id', 'client_id');
    }

    public function userAppointmentsDoctor(): HasOne
    {
        return $this->hasOne(User::class,'id', 'doctor_id');
    }
    public function userAppointmentsClient(): HasOne
    {
        return $this->hasOne(User::class,'id', 'client_id');
    }
}

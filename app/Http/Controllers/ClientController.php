<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }
    
    // public function showDash()
    // {
    //     $countDoctors = Doctor::count();
    //     $countVerAppointments = Appointment::where('verified',1)->count();
    //     $countPenAppointments = Appointment::where('verified',0)->count();

    //     return view('client.home',compact('countDoctors','countVerAppointments','countPenAppointments'));

    


    // }

    public function show()
    {
        $user = Auth::user();

        $client = Client::where('client_id', $user->id)->first();

        $logged_user = User::where('id', $user->id)->first();

        $countDoctors = Doctor::count();
        $countVerAppointments = Appointment::where('verified',1)->count();
        $countPenAppointments = Appointment::where('verified',0)->count();

        return view('client.home',compact('client', 'logged_user', 'countDoctors','countVerAppointments','countPenAppointments'));

        // return view('client.home', compact('client', 'logged_user',));
    }

    public function showDoctors()
    { 

        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified',1)->get();

        return view('client.client-doctors-list')->with('doctor_details', $doctor_details);
    }

    public function makeAppointment()
    {
        return view('client.make-appointment');
    }
}

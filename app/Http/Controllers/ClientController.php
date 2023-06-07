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

    public function show()
    {
        $user = Auth::user();
        $client = Client::where('client_id', $user->id)->first();
        $logged_user = User::where('id', $user->id)->first();
        $countDoctors = Doctor::count();
        $countVerAppointments = Appointment::where('client_id',$logged_user->id)->count();
        $countPenAppointments = Appointment::where('client_id',$logged_user->id)->where('verified',0)->count();
        return view('client.home',compact('client', 'logged_user', 'countDoctors','countVerAppointments','countPenAppointments'));
    }

    public function showDoctors()
    { 
        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified',1)->get();
        // dd($doctor_details);
        return view('client.client-doctors-list',compact('doctor_details'));
    }
}
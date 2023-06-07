<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.home');
    }

    public function showDoctors()
    { 

        // $doctor_details = User::where('role', 2)->with('doctors')->get();
        $doctor_details = Doctor::with('user')->get();
        return view('superadmin.admin-doctors-list',compact('doctor_details'));
    }

    public function showClients()
    { 

        $client_details = User::with('clients')->where('role', 1)->get();
        return view('superadmin.admin-clients-list')->with('client_details', $client_details);
    }
}

<?php

namespace App\Http\Controllers;

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

        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified',1)->get();

        // return redirect()->url('/admin/doctors-list')->with('doctor_details', $doctor_details);
        return view('superadmin.admin-doctors-list')->with('doctor_details', $doctor_details);
    }
}

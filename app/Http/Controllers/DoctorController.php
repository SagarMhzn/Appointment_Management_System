<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        if (auth()->user()->isverified){
            return view('doctor.home');
        }
        else
        {
            return redirect()->route('home');
        }
    }
}

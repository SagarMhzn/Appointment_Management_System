<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DoctorController extends Controller
{
    public function index()
    {
        if (auth()->user()->isverified) {
            return view('doctor.home');
        } else {
            return redirect()->route('home');
        }
    }

    public function show()
    { 

        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified',1)->get();

        return view('doctor.list')->with('doctor_details', $doctor_details);
    }

    public function showDoctor()
    {
        $user = Auth::user();

        $doctor = Doctor::where('doctor_id', $user->id)->first();

        $logged_user = User::where('id', $user->id)->first();

        return view('doctor.home', compact('doctor', 'logged_user'));
    }

    // public function showUnverified(){

    //     $unverified = User::with('doctors')->where('role', 2)->where('isverified',0)->get();

    //     return view('doctor.list')->with('unverified', $unverified);
    // }


    // public function showUser(){
    //     $user = Auth::user();

    //     $logged_user = User::where('id', $user->id)->first();

    //     return view('doctor.home',compact('logged_user'));
    // }

    // public function showDoctor(){

    //     $user= Auth::user();

    //     $doctor = Doctor::where('doctor_id', $user->id)->first();

    //     // dd($doctor);

    //     // $doc = Doctor::get();

    //     return view('doctor.home',compact('doctor'));
    // }
}

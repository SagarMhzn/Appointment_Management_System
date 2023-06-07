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

    public function viewDoctor(Doctor $id)
    {
        $doc_user = User::with('doctors')->where('id',$id->doctor_id)->first();
        return view('client.view-doctor',compact('doc_user'));
    }

    public function toggleVerified($id)
    {
        $user = User::findOrFail($id);
        $user->isverified = !$user->isverified;
        $user->save();
        return redirect()->back();
    }
}

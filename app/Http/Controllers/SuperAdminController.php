<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $countVerDoctors = User::where('role',2)->where('isverified',1)->count();   
        $countUnVerDoctors = User::where('role',2)->where('isverified',0)->count();   
        $countClients = User::where('role',1)->where('isverified',1)->count();   
        $countAppt = Appointment::count();   
        return view('superadmin.home',compact('countVerDoctors','countUnVerDoctors','countClients','countAppt'));
    }
    
    public function showProfile()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('superadmin.profile',compact('user'));
    }
    
    public function showPass()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('superadmin.password',compact('user'));
    }
    public function updatePass(Request $request)
    {
        $request->validate([
            'old_password'=>["required"],
            'password'=>['required','min:8','confirmed'],
        ]);
        $user = auth()->user();
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword, $user->password)) {
            $user = User::find(auth()->user()->id);
            $user->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with("info_success", "Password updated successfully");    
        } else {
            return redirect()->back()->withErrors(["old_password" => "Old password is not correct !"]);
        }
    }


    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return view('superadmin.profile',compact('user'))->with('info_sucess','Profile Updated Succesfully!');
    }

    public function showDoctors()
    { 

        $doctor_details = User::where('role', 2)->where('isverified',1)->with('doctors')->get();
        // $doctor_details = Doctor::get();
        // dd($doctor_details);
        return view('superadmin.admin-doctors-list',compact('doctor_details'));
    }
    
    public function showUnverifiedDoctors()
    { 

        $doctor_details = User::where('role', 2)->where('isverified',0)->with('doctors')->get();
        // $doctor_details = Doctor::whereget();

        // dd($doctor_details);
        return view('superadmin.unverified-list',compact('doctor_details'));
    }
    public function showClients()
    { 

        $client_details = User::with('clients')->where('role', 1)->get();
        return view('superadmin.admin-clients-list')->with('client_details', $client_details);
    }
}

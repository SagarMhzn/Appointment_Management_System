<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DoctorController extends Controller
{
    public function index()
    {
        if (auth()->user()->isverified) {

            $apptCount = Appointment::where('doctor_id',auth()->user()->id)->count();
            $apptPendCount = Appointment::where('doctor_id',auth()->user()->id)->where('status',0)->count();
            
            return view('doctor.home',compact('apptCount','apptPendCount'));
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
        return view('doctor.profile', compact('doctor', 'logged_user'));
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

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->address = $request->address;
        $doctor->dob = $request->dob;
        $doctor->license_no = $request->license;
        $doctor->qualifications = $request->qualifications;
        $doctor->experience = $request->experience;
        $doctor->field_of_expertize = $request->field_of_expertize;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $doctor->image = $filename;
        }
        $doctor->save();
        
        // dd($request);
        return redirect()->back();
    }

    public function showPass(){
        return view('doctor.password');
    }

    public function updatePass(Request $request)
    {
        $user = User::find(auth()->user()->id);


        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('password_change_success','Password Changed Successfully!');

        }else{
            return redirect()->back()->withErrors('old password doesnt match');

        }
    }
}

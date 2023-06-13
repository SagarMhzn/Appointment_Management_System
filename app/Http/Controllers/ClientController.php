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

    public function showProfile()
    {
        // $user = Auth::user()->id;
        // dd($user);
        $client_info = User::where('id', Auth::user()->id)->with('clients')->first();
        return view('client.profile', compact('client_info'));
    }
    public function show()
    {
        $user = Auth::user();
        $client = Client::where('client_id', $user->id)->first();
        $logged_user = User::where('id', $user->id)->first();
        $countDoctors = User::where('role', 2)->where('isverified', 1)->count();
        $countVerAppointments = Appointment::where('client_id', $logged_user->id)->count();
        $countPenAppointments = Appointment::where('client_id', $logged_user->id)->where('verified', 0)->count();
        return view('client.home', compact('client', 'logged_user', 'countDoctors', 'countVerAppointments', 'countPenAppointments'));
    }

    public function showDoctors()
    {
        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified', 1)->paginate(8);
        $doc = User::with('doctors')->where('role', 2)->where('isverified', 1);
        // dd($doctor_details);
        return view('client.client-doctors-list', compact('doctor_details','doc'));
    }

    public function update(Request $request)
    {


        $user = User::find(Auth::user()->id);
        $client = Client::where('client_id', Auth::user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->address = $request->address;
        $client->dob = $request->dob;
// dd($client->image);
        if ($request->hasFile('image')) {
            if ($client->photo != null) {
                $previousImagePath = public_path('public/Image/' . $client->photo);
                // dd($previousImagePath);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
                $client->update([
                    'photo' => $filename,
                ]);
            } else {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('public/Image'), $filename);
                    $client->photo = $filename;
                }
            }
        }


        $client->save();

        // dd($request);
        return redirect()->back();
    }
}

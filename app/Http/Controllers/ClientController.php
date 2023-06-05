<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function showClient()
    {
        $user = Auth::user();

        $client = Client::where('client_id', $user->id)->first();

        $logged_user = User::where('id', $user->id)->first();

        return view('client.home', compact('client', 'logged_user'));
    }

    public function showDoctors()
    { 

        $doctor_details = User::with('doctors')->where('role', 2)->where('isverified',1)->get();

        return view('client.client-doctors-list')->with('doctor_details', $doctor_details);
    }
}

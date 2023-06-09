<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\TrueType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $roleValues = [1,2,3];

        $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();

        if ($user->isverified == True && in_array($user->role, $roleValues)  ) {
            return redirect('/checkrole');
        } else {
            return view('home', compact('doctor'));
        }
    }

    
}

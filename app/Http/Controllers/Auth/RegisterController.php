<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'numeric',
                'unique:clients,phone',
                'unique:doctors,phone',
            ],
            'address' => ['required'],
            'dateAD' =>['required','date'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 1,
            'isverified' => 1,
        ]);

        Client::create([
            'client_id' => $user->id,
            'phone' => $data['phone'],
            'dob' => $data['dateAD'],
            'address' => $data['address'],
        ]);

        return $user;
    }

    public function index()
    {
        return view('auth.doctor-register');
    }

    protected function doctorRegister(DoctorRequest $data)
    {


        // dd($data);
        $user = new User();
        $randPass = Str::random(8);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($randPass);
        // $user->password = Hash::make('doctor123');
        $user->role = 2;
        $user->isverified = 0;
        $user->save();
        
        $user_id = $user->id;


        $doc = new Doctor();

        // dd($data->file('image'));

        $doc->doctor_id = $user_id;
        $doc->phone = $data->phone;

        if ($data->file('image')) {
            $file = $data->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $doc->image = $filename;
        }

        $doc->address = $data->address;
        $doc->dob = $data->dateAD;
        $doc->license_no = $data->license;
        $doc->qualifications = $data->qualification;
        $doc->experience = $data->experience;
        $doc->field_of_expertize = $data->field_of_expertize;

        // dd($doc);
        $doc->save();



        Mail::to($doc->userDoctor->email)->send(new VerificationMail($randPass));

        return redirect()->back()->with('create_success','Registration Successful');
    }
}

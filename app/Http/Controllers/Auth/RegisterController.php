<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
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
            'email' => ['required', 'string', 'email', 'max:255'],
            //  'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['numeric', 'nullable'],
            'isverified' => ['boolean', 'nullable'],
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

        // $data['isverified'] = true;
        // dd($data);
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 1,
            'isverified' => "1",
        ]);

        // if ($data['image']->file('image')) {
        //     $file = $data['image']->file('image');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/Image'), $filename);
        //     $imagePath = 'public/Image/' . $filename;
        // }

        Client::create([
            'client_id' => $user->id,
            'phone' => $data['phone'],
            'dob' => $data['dateAD'],
            'address' => $data['address'],
        ]);

        // if ($_FILES['image']) {
        //     $file = $_FILES['image'];
        //     $filename = date('YmdHi') . $file['name'];
        //     $tempPath = $file['tmp_name'];
        //     $destinationPath = public_path('public/Image/') . $filename;

        //     // Check if the uploaded file is an image
        //     $isImage = getimagesize($tempPath) !== false;

        //     if ($isImage) {
        //         // Move the uploaded file to the destination folder
        //         move_uploaded_file($tempPath, $destinationPath);

        //         // Save the image path in the database
        //         $imagePath = 'public/Image/' . $filename;


        //         Client::create([
        //             'client_id' => $user->id,
        //             'phone' => $data['phone'],
        //             'dob' => $data['dateAD'],
        //             'address' => $data['address'],
        //             'image' => $imagePath,
        //         ]);
        //     }
        // }



        // $patient->save();

        return $user;


        // $user = new User();

        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = Hash::make($data['password']);
        // $user->role = 1;
        // $user->isverified = true;
        // $user->save();


        //  Auth::login($user);

        // return redirect()->route('home')->with('success', 'User registered successfully!');

        // dd($user);

        // $data->isverified = true;
        // $data->save();
    }

    public function index()
    {
        return view('auth.doctor-register');
    }

    protected function doctorRegister(Request $data)
    {
        // dd($data);




        //save to user table
        $user = new User();
        $randPass = Str::random(8);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($randPass);
        $user->role = 2;
        $user->isverified = 0;
        $user->save();
        
        $user_id = $user->id;


        //save to doctor table


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

        // Mail::to($doc->user->email)->send(new VerificationMail($randPass));

        return redirect()->back();



        // Auth::login($user);

        // return redirect()->route('home')->with('success', 'User registered successfully!');

        // return redirect()->route('register')->with('success', 'User registered successfully!');
        // return view('auth.login');
        // return $user;

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role'=> 2,
        //     'isverified'=> 1,
        // ]);
    }
}

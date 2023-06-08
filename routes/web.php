<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     if (Auth::check()) {
//         return view('home');
//     } else {
//         return view('welcome');
//     }
// });

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/checkrole');
    } else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/checkrole')->middleware('role')->name('checkrole');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/register-doctor')
Route::post('/register-doctor', [RegisterController::class, 'doctorRegister'])->name('DOC.register');
Route::get('/register-doctor', [RegisterController::class, 'index'])->name('auth.doc.register');


Route::middleware('auth')->group(function(){

    Route::name('client.')->middleware('clientrole')->group(function () {
        Route::get('/client/home', [ClientController::class,'index'])->name('home');
        Route::get('/client/home', [ClientController::class,'show'])->name('home');
        Route::get('/client/profile', [ClientController::class,'showProfile'])->name('profile');
        Route::post('/client/profile', [ClientController::class,'update'])->name('profile-update');
        Route::get('/client/doctors-list', [ClientController::class, 'showDoctors'])->name('client-doctors-list');
        Route::get('/client/make-appointment',[AppointmentController::class, 'makeAppointment'])->name('make-appointment');
        Route::post('/client/make-appointment',[AppointmentController::class, 'createAppointment'])->name('book-appointment');
        Route::get('/client/appointments',[AppointmentController::class, 'showAppointmentClient'])->name('appointments');
        Route::get('/client/view-doctor/{id}',[DoctorController::class, 'viewDoctor'])->name('view-doctor');
        Route::resource('client', ClientController::class);
    });

    
    Route::name('doctor.')->middleware('doctorrole')->group(function () {
        Route::get('/doctor/home', [DoctorController::class,'index'])->name('home');
        Route::get('/doctor/profile', [DoctorController::class,'showDoctor'])->name('profile');
        // Route::put('/doctor/home', [DoctorController::class,'updateProfile'])->name('update-profile');
        Route::put('/doctor/profile',[DoctorController::class,'updateProfile'])->name('update-profile');
        Route::get('/doctor/list', [DoctorController::class, 'show'])->name('list');
        Route::get('/appointment/list',[AppointmentController::class, 'showAppointmentDoctor'])->name('appointments-list');
        // Route::get('/doctor/home',[DoctorController::class,'showUser'])->name('logged_user');
        
        Route::get('/doctor/appointment/toggle-verified/{id}', [AppointmentController::class, 'toggleVerified'])->name('toggleVerified');
        Route::get('/doctor/appointment/toggle-status/{id}', [AppointmentController::class, 'toggleStatus'])->name('toggleStatus');
        
        Route::get('/doctor/password', [DoctorController::class,'showPass'])->name('password');
        Route::put('/doctor/password',[DoctorController::class,'updatePass'])->name('password-update');
        Route::resource('doctor', DoctorController::class);
    });
    
    Route::name('superadmin.')->middleware('adminrole')->group(function () {
        Route::get('/admin/home', [SuperAdminController::class,'index'])->name('home');
        Route::get('/admin/profile', [SuperAdminController::class,'showProfile'])->name('profile');
        Route::put('/admin/profile', [SuperAdminController::class,'updateProfile'])->name('update-profile');
        
        Route::get('/admin/password', [SuperAdminController::class,'showPass'])->name('password');
        Route::put('/admin/password', [SuperAdminController::class,'updatePass'])->name('update-password');


        Route::get('/admin/doctors-list', [SuperAdminController::class, 'showDoctors'])->name('admin-doctors-list');
        Route::get('/admin/clients-list', [SuperAdminController::class, 'showClients'])->name('admin-clients-list');
        Route::get('/admin/doctor/toggle-verified/{id}', [DoctorController::class, 'toggleVerified'])->name('toggleVerified');
        Route::resource('superadmin', SuperAdminController::class);
    });
});



// Route::get('/admin/home', [SuperAdminController::class, 'index'])->name('superadmin.home');
// Route::get('/client/home', [ClientController::class, 'index'])->name('client.home');
// Route::get('/doctor/home', [DoctorController::class, 'index'])->name('doctor.home');

// Route::name('client.')->middleware('clientrole')->group(function () {
//     Route::get('/client/home', [ClientController::class,'index'])->name('home');
//     Route::resource('client', ClientController::class);
// });

// Route::name('doctor.')->middleware('doctorrole')->group(function () {
//     Route::get('/doctor/home', [DoctorController::class,'index'])->name('home');
//     Route::resource('doctor', DoctorController::class);
// });

// Route::name('superadmin.')->middleware('adminrole')->group(function () {
//     Route::get('/admin/home', [SuperAdminController::class,'index'])->name('home');
//     Route::resource('superadmin', SuperAdminController::class);
// });

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SuperAdminController;
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

Route::get('/', function () {
    return view('welcome');
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
        Route::resource('client', ClientController::class);
    });
    
    Route::name('doctor.')->middleware('doctorrole')->group(function () {
        Route::get('/doctor/home', [DoctorController::class,'index'])->name('home');
        Route::resource('doctor', DoctorController::class);
    });
    
    Route::name('superadmin.')->middleware('adminrole')->group(function () {
        Route::get('/admin/home', [SuperAdminController::class,'index'])->name('home');
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

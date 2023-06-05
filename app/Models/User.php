<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\SuperAdminController;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const NOT_VERIFIED = Null;
    const CLIENT = 1;
    const DOCTOR = 2;
    const SUPERADMIN = 3;

    const IS_VERIFIED = 1;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'isverified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function doctors(): HasOne
    {
        return $this->hasOne(Doctor::class, 'doctor_id','id');
    }

    public function clients(): HasOne
    {
        return $this->hasOne(Client::class, 'client_id','id');
    }

    public function admin(): HasOne
    {
        return $this->hasOne(SuperAdminController::class, 'admin_id','id');
    }
}

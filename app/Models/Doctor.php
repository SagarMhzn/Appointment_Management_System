<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = ['doctor_id','phone','image','address','dob'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id', 'doctor_id');
    }
}

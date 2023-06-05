<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    
    protected $table = 'clients';

    protected $fillable = ['client_id','phone','photo','address','dob'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id', 'client_id');
    }
}

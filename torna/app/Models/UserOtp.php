<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;



class UserOtp extends Model
{
    protected $table = 'users_otps'; // Specify the table name if it's different from the default

    protected $fillable = [
        'email',
        'otp',
        'expire_at',
    ];

    protected $dates = [
        'expire_at',
        'created_at',
        'updated_at',
    ];

     // Mutator to automatically set expire_at 3 minutes from the current time
     public function setExpireAtAttribute($value)
     {
         $this->attributes['expire_at'] = Carbon::now()->addMinutes(3);
     }

    // Your model-specific logic, relationships, etc., can go here
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'age', 'gender', 'email', 'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


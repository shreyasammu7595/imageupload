<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table='employee';
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'mobile_number', 'password', 'dob', 'profile_pic', 'status'
    ];
}

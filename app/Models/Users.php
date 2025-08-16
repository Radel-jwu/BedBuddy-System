<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Signup extends Model
{

    //
    protected $fillable = ['username' , 'phone' , 'email' , 'address' , 'password', 'profile_pic'];
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;
}

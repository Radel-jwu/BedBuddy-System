<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'phone',
        'email',
        'address',
        'password',
        'profile_pic'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roommatePreference()
    {
        return $this->hasOne(RoommatePreference::class, 'user_id');
    }
    
    public function roommate_preferences()
    {
        return $this->roommatePreference();
    }
}

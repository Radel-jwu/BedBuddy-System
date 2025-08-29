<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoommatePreference extends Model
{
    use HasFactory;

    protected $table = 'roommate_preferences'; // ✅ plural table

    protected $fillable = [
        'user_id',
        'gender_preference',
        'min_age',
        'max_age',
        'budget_min',
        'budget_max',
        'location',
        'smoking',
        'pets',
        'night_owl',
       
     
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
}

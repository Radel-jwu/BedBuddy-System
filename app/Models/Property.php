<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'street_address',
        'city',
        'type',
    ];

    // One Property can have many Bedspaces
    public function bedspaces()
    {
        return $this->hasMany(Bedspace::class);
    }
}

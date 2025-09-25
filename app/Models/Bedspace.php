<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'price',
        'rating',
        'img',
        // other fields
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    
}

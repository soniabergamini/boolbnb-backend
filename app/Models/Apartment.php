<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_number',
        'bed_number',
        'bathroom_number',
        'square_meters',
        'latitude',
        'longitude',
        'address',
        'image',
        'visible'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

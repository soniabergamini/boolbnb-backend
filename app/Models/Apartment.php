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

    // One to Many Relation Message -> Apartment
    public function messages(){
        return $this->hasMany(Message::class);
    }

    // One to Many Relation View -> Apartment
    public function views()
    {
        return $this->hasMany(View::class);
    }

    // One to Many Relation User -> Apartment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Many to Many Relation Service -> Apartment
    public function services() {
        return $this->belongsToMany(Service::class);
    }
}

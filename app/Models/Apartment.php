<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'room_number',
        'bed_number',
        'bathroom_number',
        'square_meters',
        'latitude',
        'longitude',
        'address',
        'image',
        'price',
        'visible',
        'user_id'
    ];


    // One to Many Relation Message -> Apartment
    public function messages()
    {
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
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    // Many to Many Relation Sponsorship -> Apartment
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)->withPivot('start_date', 'end_date')->withTimestamps();
    }
}

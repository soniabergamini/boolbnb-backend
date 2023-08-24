<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'hours'
    ];

    // Many to Many Relation Sponsorship -> Apartment
    public function apartments()
    {
        return $this->belongsToMany(Apartment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    // Many to Many Relation Service -> Apartment
    public function apartments() {
        return $this->belongsToMany(Apartment::class);
    }

}

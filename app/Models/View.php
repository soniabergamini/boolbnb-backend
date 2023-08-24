<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_ip',
        'apartment_id'
    ];

    // One to Many Relation View -> Apartment
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'latitude',
        'longitude',
        'city',
        'address',
        'apartment_id',
    ];
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function apartment()
    {
        return $this->hasMany(Apartment::class);
    }
}

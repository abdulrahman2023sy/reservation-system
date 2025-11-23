<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'price_per_night',
        'status',
        'admin_id',
        'review_comment',
        'capacity',
    ];

    protected $casts = [
        'price_per_night' => 'decimal:2',
    ];

    /* ==========================
        Relationships
    ===========================*/

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function images()
    {
        return $this->hasMany(ApartmentImage::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'apartment_category');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Owner → Apartments he owns
    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'owner_id');
    }

    // Admin → apartments he reviewed
    public function reviewedApartments() 
    {
        return $this->hasMany(Apartment::class, 'admin_id');
    }

    // User → Reservations made by this user
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

     /* ==========================
        Role Helpers
    ===========================*/
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isOwner()
    {
        return $this->role === 'owner';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}

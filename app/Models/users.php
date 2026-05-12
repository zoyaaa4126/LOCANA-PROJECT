<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // field yang boleh diisi
    protected $fillable = [
        'username',
        'nama',
        'email',
        'password',
        'fotoProfile',
        'role'
    ];

    // field yang disembunyikan
    protected $hidden = [
        'password',
    ];

    // otomatis hash password
    protected $casts = [
        'password' => 'hashed',
    ];

    // =========================
    // RELASI
    // =========================

    // user membuat banyak place
    public function places()
    {
        return $this->hasMany(Places::class, 'created_by');
    }

    // user punya banyak review
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    // user punya banyak wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
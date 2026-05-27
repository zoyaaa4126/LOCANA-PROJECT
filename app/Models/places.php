<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class places extends Model
{
    //
    protected $fillable = [
        'kategori_id',
        'nama_tempat',
        'deskripsi',
        'tipe_tempat',
        'alamat_lengkap',
        'latitude',
        'longitude',
        'harga_min',
        'harga_max',
        'status_aktif',
        'tempat_unggulan',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function moods()
    {
        return $this->belongsToMany(moods::class, 'place_moods');
    }

    public function kategori()
    {
        return $this->belongsTo(kategoris::class, 'kategori_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'place_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'place_id');
    }
}
<<<<<<< HEAD

    public function reviews()
    {
        return $this->hasMany(reviews::class, 'place_id');
    }
}
=======
}
>>>>>>> 02a6a367373b6c203882aaa400cf53abc922c6f0

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Moods;
use Illuminate\Support\Str;

class Places extends Model
{
    //
    protected $fillable = [
        'kategori_id',
        'nama_tempat',
        'gambar_tempat',
        'deskripsi',
        'slug',  
        'tipe_tempat',
        'alamat_lengkap',
        'latitude',
        'longitude',
        'harga_min',
        'harga_max',
        'status_aktif',
        'tempat_unggulan',
        'created_by',

        'wifi',
        'ruang_ac',
        'stopkontan',
        'parkir_luas',
        'area_merokok',
        'toilet',
        'photobooth',
        'musholla',
        'ruang_meeting',
        'board_game',
    ];

     protected static function boot()
    {
        parent::boot();
        static::creating(function ($place) {
            $place->slug = Str::slug($place->nama_tempat);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function Moods()
    {
        return $this->belongsToMany(Moods::class, 'place_moods', 'place_id', 'mood_id');
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

    public function hour() {
        return $this->hasMany(PlaceHour::class, 'place_id');
    }

    public function galleries(){
        return $this->hasMany(PlaceGallery::class, 'place_id');
    }
}

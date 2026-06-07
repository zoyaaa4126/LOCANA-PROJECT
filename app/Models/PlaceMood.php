<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceMood extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'place_id',
        'mood_id'
    ];

    // relasi ke place
    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    // relasi ke mood
    public function mood()
    {
        return $this->belongsTo(Moods::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceHour extends Model
{
    protected $fillable = [
        'place_id',
        'hari',
        'jam_buka',
        'jam_tutup'
    ];
}

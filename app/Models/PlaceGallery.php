<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceGallery extends Model
{
    protected $fillable = [
        'place_id',
        'path_file',
        'tipe'
    ];
}

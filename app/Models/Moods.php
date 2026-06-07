<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class moods extends Model
{

    protected $fillable = [
        'nama'
    ];
    //
    public function places()
    {
        return $this->belongsToMany(places::class, 'place_moods');
    }
}

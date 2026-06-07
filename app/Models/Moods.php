<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moods extends Model
{

    protected $fillable = [
        'nama'
    ];
    //
    public function places()
    {
       return $this->belongsToMany(Places::class, 'place_moods');
    }
}

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
<<<<<<< HEAD
        return $this->belongsToMany(Places::class, 'place_moods');
=======
       return $this->belongsToMany(Places::class, 'place_moods');
>>>>>>> 18f03a848609226f01aa87696752110c71f17c0b
    }
}

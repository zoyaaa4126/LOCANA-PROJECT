<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    //
    protected $fillable = [
        'user_id',
        'place_id',
        'rating',
        'comment',
        'file_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(places::class);
    }
}

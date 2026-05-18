<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    // karena migration category ga pakai timestamps
    public $timestamps = false;

    // field yang boleh diisi
    protected $fillable = [
        'nama'
    ];

    // relasi
    public function places()
    {
        return $this->hasMany(places::class, 'kategori_id');
    }
}

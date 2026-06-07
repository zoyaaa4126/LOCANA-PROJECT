<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\places;

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
        return $this->hasMany(Places::class, 'kategori_id');
    }
}
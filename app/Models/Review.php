<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const SPAM_KEYWORDS = ['tiktok', 'instagram', 'promo', 'follow', 'cek @', 'wa.me', 'bit.ly'];

    //
    protected $fillable = [
        'user_id',
        'place_id',
        'rating',
        'title',
        'comment',
        'file_url',
        'report_count', 
        'flagged'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(places::class);
    }

    public function reports()
    {
        return $this->hasMany(ReviewReport::class);
    }

    public function containsSpam(): bool
    {
        $text = strtolower($this->title . ' ' . $this->comment);
        foreach (self::SPAM_KEYWORDS as $keyword) {
            if (str_contains($text, $keyword)) return true;
        }
        return false;
    }
}

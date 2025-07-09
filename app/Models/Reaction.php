<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = ['user_id', 'ninja_id', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ninja()
    {
        return $this->belongsTo(Ninja::class);
    }

    public static function getEmojis()
    {
        return [
            'like' => '👍',
            'love' => '❤️',
            'wow' => '😮',
            'angry' => '😠',
            'laugh' => '😂',
            'sad' => '😢'
        ];
    }
}
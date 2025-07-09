<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'ninja_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ninja()
    {
        return $this->belongsTo(Ninja::class);
    }
}
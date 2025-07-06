<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ninja extends Model
{
    protected $fillable = ['name', 'skill', 'bio', 'dojo_id', 'image', 'story'];

    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;

    public function dojo() {
      return $this->belongsTo(Dojo::class);
    }

    /**
     * Relation avec les likes du ninja
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Nombre total de likes du ninja
     */
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    /**
     * Vérifie si l'utilisateur connecté a liké ce ninja
     */
    public function isLikedByUser()
    {
        if (!Auth::check()) {
            return false;
        }
        return Auth::user()->hasLiked($this);
    }
}
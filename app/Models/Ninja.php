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

    /**
     * Relation avec les favoris du ninja
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Vérifie si l'utilisateur connecté a mis ce ninja en favori
     */
    public function isFavoritedByUser()
    {
        if (!Auth::check()) {
            return false;
        }
        return Auth::user()->hasFavorited($this);
    }

    /**
     * Relation avec les réactions du ninja
     */
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    /**
     * Réaction de l'utilisateur connecté
     */
    public function getUserReaction()
    {
        if (!Auth::check()) {
            return null;
        }
        return $this->reactions()->where('user_id', Auth::id())->first();
    }

    /**
     * Compteurs de réactions par type
     */
    public function getReactionCounts()
    {
        return $this->reactions()
            ->selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();
    }

    /**
     * Relation avec les commentaires du ninja
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->with('user')->latest();
    }
}
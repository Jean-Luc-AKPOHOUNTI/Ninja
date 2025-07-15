<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'is_deleted',
        'deleted_at',
        'deleted_by'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'is_deleted' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_deleted', false);
    }
}
<?php
// app/Models/ChatMessage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pseudo',
        'message',
        'sender',
        'read',
        'replied',
        'read_at'
    ];

    protected $casts = [
        'read' => 'boolean',
        'replied' => 'boolean',
        'read_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('read', false);
    }

    public function scopeFromClient($query)
    {
        return $query->where('sender', 'client');
    }

    public function scopeFromAdmin($query)
    {
        return $query->where('sender', 'admin');
    }

    public function scopeRecent($query, $hours = 24)
    {
        return $query->where('created_at', '>=', now()->subHours($hours));
    }
}
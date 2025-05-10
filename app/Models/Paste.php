<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
  
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'tags',
        'visibility',
        'password',
        'expires_at',
        'attachment_path',
    ];

    protected $dates = ['expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasExpired()
    {
        return $this->expires_at && $this->expires_at <= now();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    
}

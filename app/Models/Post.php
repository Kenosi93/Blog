<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%");
    }
}
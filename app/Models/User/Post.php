<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'message',
        'client_id',
        'image',
        'post_type',
        'privacy_mode',
        'shared_from'
       
    ];
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function latestComment()
    {
        return $this->hasOne(Comment::class)->latest();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc')->with('replies');
    }
    public function reactions()
    {
        return $this->hasMany(PostReaction::class)->with('client');
    }
    public function singleReaction()
    {
        return $this->hasOne(PostReaction::class)->with('client');
    }

    public function multipleReactionCounts()
    {
        return $this->hasMany(PostReaction::class)
            ->selectRaw('post_id, type, count(*) as count')
            ->groupBy('post_id', 'type');
    }
    public function lastReaction()
    {
        return $this->hasOne(PostReaction::class)->latest();
    }
    public function shares(): HasMany
    {
        return $this->hasMany(Share::class);
    }
    public function files(): HasMany
    {
        return $this->hasMany(PostFile::class);
    }
    public function reports(): HasMany
    {
        return $this->hasMany(PostReport::class);
    }
}

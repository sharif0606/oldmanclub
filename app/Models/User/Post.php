<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'message',
        'client_id',
        'image',
        'post_type',
        'privacy_mode',
        'shared_from',
        'background_url'
    ];

    public function getBackgroundUrlAttribute($value)
    {
        return asset('public/uploads/post_background/' . $value);
    }
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id')->with('fromcountry');
    }
    public function latestComment()
    {
        return $this->hasOne(Comment::class)->with('client','singleReaction','replies')->latest();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc')->with('replies','client_comment','reactions','singleReaction');
    }
    public function reactions()
    {
        return $this->hasMany(PostReaction::class)->with('client');
    }
    public function singleReaction()
    {
        return $this->hasOne(PostReaction::class)->with('client')->where('client_id',Auth::user()->id);
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

    public function shared_post(){
        return $this->hasOne(Post::class,'id','shared_from')->with('client');
    }
    public function files(){
        return $this->hasMany(PostFile::class);
    }
    public function reports()
    {
        return $this->hasMany(PostReport::class);
    }
}

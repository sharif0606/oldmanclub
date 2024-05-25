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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reactions()
    {
        return $this->hasMany(PostReaction::class);
    }
    public function lastReaction()
    {
        return $this->hasOne(PostReaction::class)->latest();
    }
    public function shares(): HasMany
    {
        return $this->hasMany(Share::class);
    }
}

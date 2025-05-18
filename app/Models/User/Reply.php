<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['comment_id', 'client_id', 'content', 'parent_id'];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function client_comment(){
        return $this->belongsTo(Client::class ,'client_id','id')->select('id','fname','middle_name','last_name','username','display_name','designation','image');
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function reactions()
    {
        return $this->hasMany(ReplyReaction::class)->with('client');
    }
    public function singleReaction()
    {
        return $this->hasOne(ReplyReaction::class)->with('client');
    }
    // Relationship for nested replies
    public function children()
    {
        return $this->hasMany(Reply::class, 'parent_id')->with('client_comment', 'children', 'reactions');
    }

    public function parent()
    {
        return $this->belongsTo(Reply::class, 'parent_id');
    }
}

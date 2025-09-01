<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id')->select('id','fname','middle_name','last_name','username','display_name','designation','image');
    }
    public function client_comment(){
        return $this->belongsTo(Client::class ,'client_id','id')->select('id','fname','middle_name','last_name','username','display_name','designation','image');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class)
       // ->whereNull('parent_id')  // Get only top-level replies
        ->orderBy('created_at', 'desc')
        ->with(['client_comment', 'reactions','singleReaction','files', 'children' => function($query) {
            $query->with(['client_comment', 'reactions','singleReaction','files', 'children' => function($query) {
                $query->with(['client_comment','singleReaction', 'reactions','files']);
            }]);
        }]);
    }
    public function reactions()
    {
        return $this->hasMany(CommentReaction::class);
    }

    public function singleReaction()
    {
        return $this->hasOne(CommentReaction::class)->with('client')->where('client_id',Auth::user()->id);
    }
    public function files()
    {
        return $this->hasMany(CommentFile::class);
    }
}

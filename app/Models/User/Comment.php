<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

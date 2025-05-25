<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use HasFactory,SoftDeletes;
    public function client()
    {
        return $this->belongsTo(Client::class, 'follower_id');
    }
    /* To Get Following Id Realtion With Client */
    public function follow_client()
    {
        return $this->belongsTo(Client::class, 'following_id');
    }

    public function follower_client()
    {
        return $this->belongsTo(Client::class, 'follower_id')->select('id','display_name','email','middle_name','fname','last_name','image');
    }
}

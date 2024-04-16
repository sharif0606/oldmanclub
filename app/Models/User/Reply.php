<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory,SoftDeletes;
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}

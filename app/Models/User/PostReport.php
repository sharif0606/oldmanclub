<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'client_id', 'reason', 'comment'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}

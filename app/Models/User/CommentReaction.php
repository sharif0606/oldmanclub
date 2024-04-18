<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CommentReaction extends Model
{
    use HasFactory,SoftDeletes;
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}

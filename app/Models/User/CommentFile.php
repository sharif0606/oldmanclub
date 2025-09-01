<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentFile extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'file_name', 'file_path', 'file_type', 'file_size'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}

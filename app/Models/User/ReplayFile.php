<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplayFile extends Model
{
    use HasFactory;

    protected $fillable = ['reply_id', 'file_name', 'file_path', 'file_type', 'file_size'];

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
}

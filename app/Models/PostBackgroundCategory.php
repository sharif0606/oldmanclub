<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBackgroundCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order', 'status'];

    public function backgrounds()
    {
        return $this->hasMany(PostBackground::class);
    }

    
}

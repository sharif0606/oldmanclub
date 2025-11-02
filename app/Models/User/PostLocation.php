<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLocation extends Model
{
    use HasFactory;

    protected $fillable=[
        'post_type',
        'post_id',
        'place_name',
        'lat',
        'lon',
        'address',
        'type',
        'place_id',
        'place_rank',
        'name'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

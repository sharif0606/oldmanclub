<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBackground extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'image', 'order', 'status'];

    public function category()
    {
        return $this->belongsTo(PostBackgroundCategory::class);
    }

    public function getImageAttribute($value)
    {
        $url = asset('public/uploads/post_background/' . $value);
        $path = $value;
        return [
            'url' => $url,
            'path' => $path
        ];
    }
}

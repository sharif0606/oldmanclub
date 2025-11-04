<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\SalePost;
use App\Models\SalePostTag;
class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'status',
    ];

    public function salePosts()
    {
        return $this->belongsToMany(SalePost::class);
    }

    public function salePostTags()
    {
        return $this->hasMany(SalePostTag::class);
    }
}

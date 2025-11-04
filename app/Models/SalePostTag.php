<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\SalePost;
use App\Models\Tag;

class SalePostTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_post_id',
        'tag_id',
    ];

    public function salePost()
    {
        return $this->belongsTo(SalePost::class, 'sale_post_id', 'id');
    }
    
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}

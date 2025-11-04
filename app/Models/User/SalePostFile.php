<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePostFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_post_id',
        'file_name',
        'file_type',
        'file_size',
        'file_path',
        'status',
    ];
    
    public function salePost()
    {
        return $this->belongsTo(SalePost::class, 'sale_post_id', 'id');
    }
}

<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['printing_service_id', 'quantity'];

    public function print_service()
    {
        return $this->belongsTo(PrintingService::class,'printing_service_id','id');
    }
}

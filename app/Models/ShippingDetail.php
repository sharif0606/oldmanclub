<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id','id');
    }
}

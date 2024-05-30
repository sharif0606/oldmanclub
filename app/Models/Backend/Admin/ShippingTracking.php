<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingTracking extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function shipping(){
        return $this->belongsTo(\App\Models\User\Shipping::class, 'shipping_id','id');
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user(){
        return $this->belongsTo(\App\Models\Backend\User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id','id');
    }
}

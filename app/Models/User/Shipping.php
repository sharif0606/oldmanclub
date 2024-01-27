<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function shippingstatus(){
        return $this->hasMany(ShippingStatusType::class,'shipping_id','id');
    }
    public function shippingtrack(){
        return $this->hasMany(ShippingStatusType::class,'shipping_id','id');
    }
}

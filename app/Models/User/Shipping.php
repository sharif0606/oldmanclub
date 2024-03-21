<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ShippingDetail;

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
        return $this->hasMany(ShippingTracking::class,'shipping_id','id');
    }
    public function shippingdetail(){
        return $this->hasOne(ShippingDetail::class,'shipping_id','id');
    }
    public function shippingcomment(){
        return $this->hasMany(ShippingComment::class,'shipping_id','id');
    }
}

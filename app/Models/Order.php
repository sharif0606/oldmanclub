<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User\Client;
use App\Models\ShippingAddress;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function shipping(){
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id', 'id');
    }
}

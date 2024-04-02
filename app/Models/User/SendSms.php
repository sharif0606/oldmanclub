<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SendSms extends Model
{
    use HasFactory;
    
    public function purchase(){
        return $this->belongsTo(PurchaseSms::class,'purchase_id','id');
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Admin\SmsPackage;
class PurchaseSms extends Model
{
    use HasFactory;
    public function package(){
        return $this->belongsTo(SmsPackage::class,'smspackage_id','id');
    }
}

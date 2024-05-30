<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsPackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function purchase(){
        return $this->hasMany(PurchaseSms::class,"smspachage_id",'id');
    }
}

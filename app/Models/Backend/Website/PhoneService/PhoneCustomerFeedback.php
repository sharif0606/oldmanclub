<?php

namespace App\Models\Backend\Website\PhoneService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User\Client;

class PhoneCustomerFeedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function client(){
        return $this->belongsTo(Client::class,'customer_id','id');
    }
}

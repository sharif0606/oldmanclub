<?php

namespace App\Models\Backend\Website\PrintingService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\User\Client;
class PrintCustomerFeedback extends Model
{
    use HasFactory;
    use softDeletes;
    public function client(){
        return $this->belongsTo(Client::class,'customer_id','id');
    }
}

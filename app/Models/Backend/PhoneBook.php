<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class PhoneBook extends Model
{
    use HasFactory;
    use softDeletes;
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
}

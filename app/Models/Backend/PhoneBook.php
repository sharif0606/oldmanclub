<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneBook extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
}

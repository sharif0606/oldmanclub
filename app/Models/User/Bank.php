<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'bank_name','branch_name','rtn_number','swift_code','address'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
}

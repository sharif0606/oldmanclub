<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
     protected $fillable = [
        'user_id',
        'client_id',
        'message',
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(\App\Models\Backend\User::class, 'user_id','id');
    }
    public function client(){
        return $this->belongsTo(\App\Models\User\Client::class ,'client_id','id');
    }
}

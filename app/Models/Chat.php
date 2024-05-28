<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\User;
use App\Models\User\Client;
class Chat extends Model
{
     protected $fillable = [
        'user_id',
        'client_id',
        'message',
    ];
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
}

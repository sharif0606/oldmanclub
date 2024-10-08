<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;
class Message extends Model
{
    protected $fillable = ['from_user', 'to_user', 'message', 'file', 'is_read'];
    public function client(){
        return $this->belongsTo(Client::class ,'from_user','id');
    }
}

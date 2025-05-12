<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;
class Message extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id', 'user_id', 'type', 'content', 'file_name','file_size','reply_to'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function user()
    {
        return $this->belongsTo(Client::class)->select('id', 'display_name', 'image', 'avatar');
    }
    
    
}

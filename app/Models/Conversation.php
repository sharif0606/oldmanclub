<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;
class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['is_group', 'name', 'avatar', 'created_by'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(Client::class);
    }
    
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;
class User extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function chat(){
        return $this->hasMany(Chat::class);
    }
    
}

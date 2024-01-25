<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneGroup extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function phonebook()
    {
        return $this->hasMany(PhoneBook::class);
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Website\CustomerFeedback;
use App\Models\Backend\Website\PrintingService\PrintCustomerFeedback;
use App\Models\Chat;
class Client extends Model
{
    use HasFactory;
    public function feedback(){
        return $this->hasMany(CustomerFeedback::class);
    }
    public function cusfeedback(){
        return $this->hasMany(PrintCustomerFeedback::class);
    }
    public function chats(){
         return $this->hasMany(Chat::class, 'client_id');
    }
    public function phonebook()
    {
        return $this->hasMany(\App\Models\Backend\PhoneBook::class);
    }
}

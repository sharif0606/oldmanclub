<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Website\CustomerFeedback;
use App\Models\Backend\Website\PrintingService\PrintCustomerFeedback;
use App\Models\Chat;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes;
    public function feedback(){
        return $this->hasMany(CustomerFeedback::class);
    }
    public function cus_feedback(){
        return $this->hasMany(PhoneCustomerFeedback::class);
    }
    public function cusfeedback(){
        return $this->hasMany(PrintCustomerFeedback::class);
    }
    public function chats(){
         return $this->hasMany(Chat::class, 'client_id');
    }
    public function phonebook()
    {
        return $this->hasMany(\App\Models\User\PhoneBook::class);
    }
    public function phonegroup()
    {
        return $this->hasMany(\App\Models\User\PhoneGroup::class);
    }
    public function shipping()
    {
        return $this->hasMany(Shipping::class, 'client_id','id');
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Website\CustomerFeedback;
use App\Models\Backend\Website\PrintingService\PrintCustomerFeedback;
use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    protected $fillable = ['is_online','profile_visibility','gender'];
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable;
    
    public function feedback(){
        return $this->hasMany(CustomerFeedback::class);
    }
    public function cus_feedback(){
        return $this->hasMany(PhoneCustomerFeedback::class);
    }
    public function metas(){
        return $this->hasMany(ClientMeta::class);
    }
    public function cusfeedback(){
        return $this->hasMany(PrintCustomerFeedback::class);
    }

    public function conversations(){
        return $this->belongsToMany(Conversation::class, 'client_conversation', 'client_id', 'conversation_id');
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
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function company(){
        return $this->hasMany(Company::class,'client_id','id');
    }
    public function post(){
        return $this->hasMany(Post::class,'client_id','id');
    }
    public function addres_verify(){
        return $this->hasOne(AddressVerification::class,'client_id','id');
    }
    public function currentcountry(){
        return $this->belongsTo(Country::class,'current_country_id','id');
    }
    public function currentstate(){
        return $this->belongsTo(State::class,'current_state_id','id');
    }
    public function fromcountry(){
        return $this->belongsTo(Country::class,'from_country_id','id');
    }
    public function fromstate(){
        return $this->belongsTo(State::class,'from_state_id','id');
    }
    public function fromcity(){
        return $this->belongsTo(City::class,'from_city_id','id');
    }
    public function currentcity(){
        return $this->belongsTo(City::class,'current_city_id','id');
    }
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id')->with('follower_client');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
     /*
     Here Function is Followings
         Will result Who are follower here example as follower_id = 4  and follwing are
         SELECT * FROM `follows` WHERE `follower_id`=4;
    */
    public function getFormattedFollowersCountAttribute()
    {
        $count = $this->followers()->count();

        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M Followers';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K Followers';
        } else {
            return $count . ' Followers';
        }
    }

    public function getFormattedFollowingsCountAttribute()
    {
        $count = $this->followings()->count();

        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M Following';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K Following';
        } else {
            return $count . ' Following';
        }
    }
}
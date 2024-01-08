<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Website\CustomerFeedback;

class Client extends Model
{
    use HasFactory;
    public function feedback(){
        return $this->hasMany(CustomerFeedback::class);
    }
}

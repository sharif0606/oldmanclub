<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplyReaction extends Model
{
    use HasFactory,SoftDeletes;

    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id')->select('id','fname','middle_name','last_name','username','display_name','designation','image');
    }
}

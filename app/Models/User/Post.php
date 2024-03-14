<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'message',
        'client_id',
        'image',
    ];
    public function client(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressVerification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['client_id', 'id_image', 'document'];
    public function client(){
        return $this->belongsTo(Client::class,'id_image','client_id');
    }
    
}

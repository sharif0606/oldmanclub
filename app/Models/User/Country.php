<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'phonecode',
    ];
    public function client(){
        return $this->hasMany(Client::class);
    }
}

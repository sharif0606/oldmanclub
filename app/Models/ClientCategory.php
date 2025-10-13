<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;

class ClientCategory extends Model
{
    use HasFactory;

    protected $table = 'client_categories';
    protected $fillable = ['client_id', 'category_id', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    
}

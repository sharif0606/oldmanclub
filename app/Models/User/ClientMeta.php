<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMeta extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'meta_key', 'meta_value', 'meta_status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

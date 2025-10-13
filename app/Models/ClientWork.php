<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;

class ClientWork extends Model
{
    use HasFactory;

    protected $table = 'client_works';
    protected $fillable = ['client_id', 'company_name', 'position', 'start_date', 'end_date', 'description', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


}

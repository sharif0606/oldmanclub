<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;

class ClientEducation extends Model
{
    use HasFactory;

    protected $table = 'client_education';
    protected $fillable = ['client_id', 'institution', 'field_of_study', 'degree', 'start_date', 'end_date', 'description', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

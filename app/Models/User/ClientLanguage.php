<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;

class ClientLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'language_id', 'status'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}

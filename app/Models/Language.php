<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\ClientLanguage;
class Language extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'status'];
    public function clientLanguages()
    {
        return $this->hasMany(ClientLanguage::class);
    }
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NfcInformation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',
        'prefix',
        'suffix',
        'accreditations',
        'preferred_name',
        'maiden_name',
        'pronoun',
        'title',
        'department',
        'company',
        'headline',
    ];
}

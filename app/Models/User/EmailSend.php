<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailSend extends Model
{
    protected $casts = [
    'date' => 'datetime',
    ];
    use HasFactory;
    use SoftDeletes;
}

<?php

namespace App\Models\Backend\Website\LLcservice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Llcservice extends Model
{
    use HasFactory;
    use softDeletes;
    protected $casts = [
        'feature_list' => 'array',
    ];
}

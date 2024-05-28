<?php

namespace App\Models\Backend\Website\LLcservice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Llcservice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'feature_list' => 'array',
    ];
}

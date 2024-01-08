<?php

namespace App\Models\Backend\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class NfcCardImage extends Model
{
    use HasFactory;
    use softDeletes;
    protected $casts = [
        'feature_list' => 'array',
    ];
}

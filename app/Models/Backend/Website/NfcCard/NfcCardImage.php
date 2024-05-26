<?php

namespace App\Models\Backend\Website\NfcCard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NfcCardImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'feature_list' => 'array',
    ];
}

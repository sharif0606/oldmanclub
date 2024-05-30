<?php

namespace App\Models\Backend\Website\NfcCard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NfcCardPrice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'card_feature_list' => 'array',
    ];
}

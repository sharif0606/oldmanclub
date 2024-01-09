<?php

namespace App\Models\Backend\Website\NfcCard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class NfcCardPrice extends Model
{
    use HasFactory;
    use softDeletes;
    protected $casts = [
        'card_feature_list' => 'array',
    ];
}

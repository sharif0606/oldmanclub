<?php

namespace App\Models\Backend\Website\ShippingService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ChoiceSection extends Model
{
    use HasFactory;
    use softDeletes;
    protected $casts = [
        'feature_list' => 'array',
    ];
}

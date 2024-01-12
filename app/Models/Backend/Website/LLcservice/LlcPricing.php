<?php

namespace App\Models\Backend\Website\LLcservice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class LlcPricing extends Model
{
    use HasFactory;
    use softDeletes;
    protected $casts = [
        'llcpricingfeature_list' => 'array',
    ];
}

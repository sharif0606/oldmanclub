<?php

namespace App\Models\Backend\Website\SmartMail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class SmartSmsService extends Model
{
    use HasFactory;
    use softDeletes;
}

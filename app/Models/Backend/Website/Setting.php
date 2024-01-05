<?php

namespace App\Models\Backend\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Setting extends Model
{
    use HasFactory;
    use softDeletes;
}

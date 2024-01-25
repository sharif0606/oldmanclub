<?php

namespace App\Models\Backend\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homepage extends Model
{
    use HasFactory;
    use SoftDeletes;
}

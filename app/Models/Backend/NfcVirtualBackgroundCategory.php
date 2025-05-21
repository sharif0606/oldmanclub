<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NfcVirtualBackgroundCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
    public function backgrounds()
    {
        return $this->hasMany(NfcVirtualBackground::class, 'category_id');
    }
}

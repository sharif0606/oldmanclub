<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NfcVirtualBackground extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'category_id'];
    public function nfc_virtual_background_category()
    {
        return $this->belongsTo(NfcVirtualBackgroundCategory::class, 'category_id');
    }
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcDesign extends Model
{
    use HasFactory;
    public function design_card(){
        return $this->hasOne(DesignCard::class,'id','design_card_id');
    }
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;
class NfcCard extends Model
{
    use HasFactory;
    public function nfc_info(){
        return $this->hasOne(NfcInformation::class);
    }
    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }
    public function card_design(){
        return $this->hasOne(NfcDesign::class);
    }
    public function nfcFields()
    {
        return $this->belongsToMany(NfcField::class)->withPivot('field_value');;
    }
}

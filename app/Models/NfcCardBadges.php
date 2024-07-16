<?php

namespace App\Models;

use App\Models\Backend\NfcCard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcCardBadges extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nfc_card_id', 'badge_image'];

    public function nfcCard()
    {
        return $this->belongsTo(NfcCard::class);
    }
}
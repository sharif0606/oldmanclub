<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrintingServiceImage extends Model
{
    use HasFactory,SoftDeletes;
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    public function print_service(){
        return $this->belongsTo(PrintingService::class, 'printing_service_id','id');
    }
}

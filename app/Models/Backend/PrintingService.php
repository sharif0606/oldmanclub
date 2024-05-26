<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\PrintingServiceImage;

class PrintingService extends Model
{
    use HasFactory, SoftDeletes;
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    public function printing_service_image(){
        return $this->hasMany(PrintingServiceImage::class,'printing_service_id','id');
    }
    public function featuredImage()
    {
        return $this->hasOne(PrintingServiceImage::class)->where('is_featured', true);
    }
    public function cartItem(){
        return $this->hasMany(CartItem::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    //for cart page
    public function images()
    {
        return $this->hasMany(PrintingServiceImage::class, 'printing_service_id');
    }
    //for checkout page
    public function printimages()
    {
        return $this->hasMany(PrintingServiceImage::class, 'printing_service_id')->where('is_featured', true);
    }
}

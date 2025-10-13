<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Client;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'icon', 'description', 'parent_id', 'status'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_categories');
    }
    
    
}

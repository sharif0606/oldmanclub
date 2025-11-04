<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalePostCategory;
use App\Models\Tag;

class SalePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'photos',
        'price',
        'category_id',
        'condition',
        'description',
        'availability',
        'sku',
        'client_id',
        'country_id',
        'state_id',
        'city_id',
        'public_meetup',
        'door_pickup',
        'door_dropoff',
        'hide_from_friends',
        'status',
        'published_at',
        'unpublished_at',
        'notify_at',
        'notify_count',
        'view_count',
        'like_count',
        'comment_count',
        'share_count',
        'save_count',
        'report_count',
        'spam_count',
    ];

    public function category()
    {
        return $this->belongsTo(SalePostCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function files()
    {
        return $this->hasMany(SalePostFile::class);
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Share extends Model
{
    use HasFactory,SoftDeletes;
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}

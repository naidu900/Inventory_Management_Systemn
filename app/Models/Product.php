<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['user_id', 'name', 'price', 'stock'];


     public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}





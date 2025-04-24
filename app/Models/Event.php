<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'price',
        'web_url',
        'space_id',
        'category_id',
        'image_path'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function savedBy(): HasMany
    {
        return $this->hasMany(SaveEvent::class);
    }
}

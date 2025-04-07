<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaveEvent extends Model
{
    public function event(): BelongsTo {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function saveEvents(): HasMany {
        return $this->hasMany(SaveEvent::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Space extends Model
{
    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function events(): HasMany {
        return $this->hasMany(Event::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

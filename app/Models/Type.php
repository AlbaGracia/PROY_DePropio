<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    public function spaces(): HasMany
    {
        return $this->hasMany(Space::class);
    }

    protected static function booted()
    {
        static::deleting(function ($type) {
            $defaultTypeId = 1;

            Space::where('type_id', $type->id)
                 ->update(['type_id' => $defaultTypeId]);
        });
    }
}

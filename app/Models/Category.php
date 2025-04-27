<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    protected static function booted()
    {
        static::deleting(function ($category) {
            $defaultCategoryId = 1;

            Event::where('category_id', $category->id)
                ->update(['category_id' => $defaultCategoryId]);
        });
    }
}

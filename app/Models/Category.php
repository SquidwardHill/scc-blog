<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    private mixed $posts;

    public function posts(): HasMany
    {
        //hasOne, hasMany, belongsTo, BelongsToMany
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    //always eager load with the following models
    protected $with = ['category', 'author'];

    public function category(): BelongsTo
    {
        //hasOne, hasMany, belongsTo, BelongsToMany
        return $this->belongsTo(Category::class);
    }

    //    $post->user;
    // Laravel makes assumptions using the name of the method, looking for that foreign key.
    //so here it would look for author_id (which isn't a columm the user.)
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

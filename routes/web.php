<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    \Illuminate\Support\Facades\DB::listen(function ($query){
//       logger($query->sql);
//    });
    //added clockwork instead

    return view('posts', [
        //by default, laravel will lazy load all the relationships. Why execute a query to fetch all the relationships if you are never going to execute them?
        //'posts' => Post::all()
        //latest adds the orderBy constraint behind the scenes
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});
//route model binding, default key that represents a post is ID
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

//because of route model binding, laravel will try to initially find by matching id-- so we can be explicit about the attribute were trying to find the model by (slug)
Route::get('/categories/{category:slug}', function (Category $category){
    return view('posts', [
        //we have the category, now we want to return all posts associated.
        //eloquent relationships in the model.

        'posts' => $category->posts
    ]);
});

//define the key with :username (as opposed to using id)
Route::get('/authors/{author:username}', function (User $author){
    return view('posts', [
        //see user model, posts method.
        'posts' => $author->posts

        //if you want to turn eager loading off when its set in the model, you can use 'without'
        //'posts' => $author->posts->without(['category', 'author']);
    ]);
});

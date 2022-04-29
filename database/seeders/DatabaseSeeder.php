<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create([
            'name' => 'Sydney'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

//        call a factory method to quickly create and persist a new user in the database

//
//        $events = Category::create([
//            'name' => 'Events',
//            'slug' => 'events',
//        ]);
//
//        $general = Category::create([
//            'name' => 'General',
//            'slug' => 'general',
//        ]);
//
//        $volunteering = Category::create([
//            'name' => 'Volunteering',
//            'slug' => 'volunteering',
//        ]);
//
//        $news = Category::create([
//            'name' => 'News',
//            'slug' => 'news',
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $events->id,
//            'slug'=> 'byob',
//            'title'=> 'BYOB',
//            'excerpt' => 'BYOB excerpt',
//            'body'=> 'lorem ipsum dolar amet sit'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $news->id,
//            'slug'=> 'denny-cove-acquisition',
//            'title'=> 'Denny Cove Acquisition',
//            'excerpt' => 'Denny Cove Acquisition excerpt',
//            'body'=> 'lorem ipsum dolar amet sit'
//        ]);

    }
}

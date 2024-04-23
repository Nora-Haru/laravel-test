<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run():void
    {
        
        User::create([
            'name' => 'Satou Haruki', 
            'username' => 'haruki', 
            'email' => 'natsuharu@gmail.com',
            'password' => bcrypt('1234qwe')
         ]);

        // User::create([
        //      'name' => 'Jawa', 
        //      'email' => 'alamakanjawir@gmail.com',
        //      'password' => bcrypt('1234')
        //  ]);
        
        
        User::factory(4)->create();

         Category::create([
            'name' => 'Education', 
            'slug' => 'education'
        ]);

         Category::create([
            'name' => 'History', 
            'slug' => 'history'
        ]);

         Category::create([
            'name' => 'Tech', 
            'slug' => 'technology'
        ]);

         Category::create([
            'name' => 'Game', 
            'slug' => 'game'
        ]);

         Category::create([
            'name' => 'Anime', 
            'slug' => 'anime'
        ]);

         Category::create([
            'name' => 'Coding', 
            'slug' => 'coding'
        ]);

         Category::create([
            'name' => 'Design', 
            'slug' => 'design'
        ]);

         Category::create([
            'name' => 'Music', 
            'slug' => 'music'
        ]);

         Category::create([
            'name' => 'Astronomy', 
            'slug' => 'astronomy'
        ]);
        
         Category::create([
            'name' => 'Food', 
            'slug' => 'food'
        ]);
        
         Category::create([
            'name' => 'Economy', 
            'slug' => 'economy'
        ]);

         Category::create([
            'name' => 'Politic', 
            'slug' => 'politic'
        ]);

        Post::factory(25)->create();

        // Post::create([
        //     'title' => 'Judul 1', 
        //     'slug' => 'title-1',
        //     'excerpt' => ('LORA'),
        //     'body' => ('ISI BODY'),
        //     'category_id' => 2,
        //     'user_id' => 1 
        // ]);

        // Post::create([
        //     'title' => 'Judul 2', 
        //     'slug' => 'title-2',
        //     'excerpt' => ('WADUH'),
        //     'body' => ('ISI Body'),
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul 3', 
        //     'slug' => 'title-3',
        //     'excerpt' => ('ISI EXCERPT'),
        //     'body' => ('ISI BODY '),
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}

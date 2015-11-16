<?php

use Illuminate\Database\Seeder;
use lara\pts\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        factory('lara\pts\Post',15)->create();
    }
}

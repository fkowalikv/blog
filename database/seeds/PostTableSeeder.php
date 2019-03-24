<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 5)->create();

        $tags = App\Tag::all();

        App\Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, $tags->count()))->pluck('id')->toArray()
            );
        });
    }
}

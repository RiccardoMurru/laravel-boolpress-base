<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence();

            $new_post = new Post();
            $new_post->user_id = $users->random()->id;
            $new_post->title = $title;
            $new_post->body = $faker->text(500);
            $new_post->slug = Str::slug($title, '-');
            $new_post->save();
        }
    }
}

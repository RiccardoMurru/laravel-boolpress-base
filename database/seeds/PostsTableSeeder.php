<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use Faker\Generator as Faker;

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
            $new_post = new Post();
            $new_post->user_id = $users->random()->id;
            $new_post->title = $faker->sentence();
            $new_post->category = $faker->word();
            $new_post->body = $faker->text(500);
            $new_post->save();
        }
    }
}

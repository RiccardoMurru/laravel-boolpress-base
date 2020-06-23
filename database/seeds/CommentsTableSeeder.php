<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        $users = User::all();

        for ($i = 0; $i < 20; $i++) {
            $new_comment = new Comment();
            $new_comment->post_id = $posts->random()->id;
            $new_comment->user_id = $users->random()->id;
            $new_comment->body = $faker->text(250);
            $new_comment->save();
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $new_user = new User;
            $new_user->name = $faker->name();
            $new_user->email = $faker->freeEmail();
            $new_user->password = $faker->password(8, 15);
            $new_user->save();
        }
    }
}

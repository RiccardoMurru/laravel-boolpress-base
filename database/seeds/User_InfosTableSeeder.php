<?php

use Illuminate\Database\Seeder;
use App\UserInfos;
use App\User;
use Faker\Generator as Faker;

class User_InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            $user_info = new UserInfos();
            $user_info->user_id = $user->id;
            $user_info->address = $faker->address();
            $user_info->phone = $faker->phoneNumber();
            $user_info->save();
        }
    }
}

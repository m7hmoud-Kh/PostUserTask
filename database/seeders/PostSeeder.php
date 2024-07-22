<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $userIds = User::pluck('id');
        for ($i=0; $i <30 ; $i++) {
            Post::create([
                'title' => $faker->unique()->sentence(2),
                'body' => $faker->text(),
                'user_id' => $userIds->random()
            ]);
        }

    }
}

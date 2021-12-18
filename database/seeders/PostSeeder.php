<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $insert = [
            [
                'id_category' => rand(1, 3),
                'id_user' => rand(3, 4),
                'title' => $title = $faker->sentence(),
                'slug' => Str::slug($title),
                'body' => $body = $faker->text(300),
                'excerpt' => Str::words($body, 10),
                'created_at' => Carbon::now(),
            ],
            [
                'id_category' => rand(1, 3),
                'id_user' => rand(3, 4),
                'title' => $title = $faker->sentence(),
                'slug' => Str::slug($title),
                'body' => $body = $faker->text(300),
                'excerpt' => Str::words($body, 10),
                'created_at' => Carbon::now(),
            ],
            [
                'id_category' => rand(1, 3),
                'id_user' => rand(3, 4),
                'title' => $title = $faker->sentence(),
                'slug' => Str::slug($title),
                'body' => $body = $faker->text(300),
                'excerpt' => Str::words($body, 10),
                'created_at' => Carbon::now(),
            ],
            [
                'id_category' => rand(1, 3),
                'id_user' => rand(3, 4),
                'title' => $title = $faker->sentence(),
                'slug' => Str::slug($title),
                'body' => $body = $faker->text(300),
                'excerpt' => Str::words($body, 10),
                'created_at' => Carbon::now(),
            ],
        ];

        Post::insert($insert);
    }
}

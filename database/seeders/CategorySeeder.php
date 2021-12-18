<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'name' => $title1 = 'Programming',
                'slug' => Str::slug($title1),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => $title2 = 'Tips and Trick',
                'slug' => Str::slug($title2),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => $title3 = 'Lifehack',
                'slug' => Str::slug($title3),
                'created_at' => Carbon::now(),
            ],
        ];

        Category::insert($insert);
    }
}
